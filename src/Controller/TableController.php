<?php

namespace App\Controller;
use App\Form\TableChoiceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class TableController extends AbstractController
{
    #[Route('/table/print/{nombre}', name: 'table_print')]
    public function print($nombre)
    {
        // Calculer les valeurs pour la table
        $valeursCalculees = [];
        for ($i = 1; $i <= 10; $i++) {
            $valeursCalculees[] = $nombre * $i;
        }

        return $this->render('table/print.html.twig', [
            'nombre' => $nombre,
            'valeursCalculees' => $valeursCalculees,
        ]);
    }



    #[Route('/table/select')]
    public function select(Request $req) {

        $form = $this->createForm(TableChoiceType::class);
        $form->handleRequest($req);
if ($form->isSubmitted()) {

    $data = $form->getData();
    $ret['nombre'] = $data['table_number'];
    $response = $this->redirectToRoute('table_print',$ret);        

        }else {

            $response = $this->render('table/formulaire.html.twig', [
                    'form' => $form->createView(),
            ]);
        }

        return $response;
    } 


}