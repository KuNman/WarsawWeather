<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Weather;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    /**
     *
     * @Route("/", name="home")
     */

    public function indexAction()
    {

        $current = (new \DateTime())->format('Y-m-d H:i:s');

        $repository = $this->getDoctrine()->getRepository('AppBundle:Weather');
        $query = $repository->createQueryBuilder('l')->setMaxResults(1)
            ->orderBy('l.id', 'DESC')->getQuery();

        $last = $query->getResult();


       $id = $last[0]->getId();
       $time = $last[0]->getDate()->format('Y-m-d H:i:s');
        echo $time;



//
//        return $this->render('default/index.html.twig', array(
//            'city' => $city,
//            'temp' => $temp,
//            'date' => $date,
//            'wind' => $wind
//        ));
    }

    /**
     * @Route("/download")
     */
    public function downloadWeather()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'api.openweathermap.org/data/2.5/weather?q=Warsaw,pl&lang=pl&units=metric&APPID=cec0709ff900c6d42355ce30cfb061b2');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        $array = json_decode($response, true);

        $city = 'Warsaw';
        $temp = $array['main']['temp'];
        $wind = $array['wind']['speed'];

        $time = date('Y-m-d');

        $weather = new Weather();
        $weather->setCity($city);
        $weather->setTemp($temp);
        $weather->setWind($wind);
        $weather->setDate(\DateTime::createFromFormat('Y-m-d', $time));

        $em = $this->getDoctrine()->getManager();
        $em->persist($weather);
        $em->flush();

        return $this->render('default/index.html.twig', array(
            'city' => $city,
            'temp' => $temp,
            'date' => $time,
            'wind' => $wind));
    }
}
