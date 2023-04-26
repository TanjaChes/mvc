<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyControllerTwig extends AbstractController
{
    #[Route("/", name: "home")]
    public function presentation(): Response
    {
        return $this->render('home.html.twig');
    }

    #[Route("/about", name: "about")]
    public function about(): Response
    {
        return $this->render('about.html.twig');
    }

    #[Route("/report", name: "report")]
    public function report(): Response
    {
        return $this->render('report.html.twig');
    }

    #[Route("/lucky", name: "lucky")]
    public function number(): Response
    {
        // Set the timezone to use
        date_default_timezone_set('Europe/Stockholm');
        // The date of today
        $today = date('Y-m-d H:i:s');
        // Name of the week day
        $weekdayEng = date('N');
        $weekSv = ["Måndag", "Tisdag", "Onsdag", "Torsdag", "Fredag", "Lördag", "Söndag"];
        if ($weekdayEng == 1) {
            $weekdaySv = $weekSv[0];
        } elseif ($weekdayEng == 2) {
            $weekdaySv = $weekSv[1];
        } elseif ($weekdayEng == 3) {
            $weekdaySv = $weekSv[2];
        } elseif ($weekdayEng == 4) {
            $weekdaySv = $weekSv[3];
        } elseif ($weekdayEng == 5) {
            $weekdaySv = $weekSv[4];
        } elseif ($weekdayEng == 6) {
            $weekdaySv = $weekSv[5];
        } else {
            $weekdaySv = $weekSv[6];
        }
        $weeknumber = date('W');
        $data = [
            'today' => $today,
            'weekday' => $weekdaySv,
            'weeknumber' => $weeknumber
        ];

        return $this->render('lucky.html.twig', $data);
    }

    #[Route("/api/quote", name: "quote")]
    public function quote(): Response
    {
        $number = random_int(0, 100);

        $data = [
            'number' => $number
        ];

        return $this->render('quote.html.twig', $data);
    }
}
