<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 12/01/2018
 * Time: 11:01
 */

namespace AppBundle\Controller;


use AppBundle\Entity\Chambre;
use AppBundle\Form\ChambreType;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ChambreController extends Controller
{
    /**
     * @Rest\View(StatusCode = Response::HTTP_OK)
     * @Rest\Get("/reservations")
     */
    public function getReservation(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $reservation = $em->getRepository(Chambre::class)->findAll();

        if (empty($reservation)) {
            return View::create(['message' => 'Not found'], Response::HTTP_NOT_FOUND);
        }

        return $reservation;
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/reservations")
     */
    public function postReservation(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $chambre = new Chambre();
        $form = $this->createForm(ChambreType::class, $chambre);
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $em->merge($chambre);
            $em->flush();
            return $chambre;
        } else {
            return $form;
        }
    }

    /**
     * @Route("/chambres", name="liste_chambres")
     * @Template()
     */
    public function chambreAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $chambre = new Chambre();
        $form = $this->createForm(ChambreType::class, $chambre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($chambre);
            $em->flush();
           // return $this->redirectToRoute();
        }

        return [
          'form' => $form->createView()
        ];
    }
}