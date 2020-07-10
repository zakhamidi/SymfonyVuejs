<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BeverageRepository;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;


class ApiController extends AbstractController
{
    /**
     * @Route("/api/beverages", name="All_Beverages", methods={"GET"})
     */
    public function index(BeverageRepository $beverageRepository, /*NormalizerInterface $normalizer*/ SerializerInterface $serializer )
    {
        $beverages= $beverageRepository->findAll();

        //Different ways to code json

        /*
        $json=json_encode([
            'type'=>'coffee',
            'statut'=>'Classic'
        ]);   
         dd($json,$beverages);
        */
        //we can do a normal code to creat json for our beverages
        //$bvgnormalizer=$normalizer->normalize($beverages,null,['groups'=>'beverage:read']);
        //encode our object to json
        //$json=json_encode($bvgnormalizer);

        //otherwise we can only use the Serializer
        $json=$serializer->serialize($beverages,'json',['groups'=>'beverage:read']);
        
        // the response on Json 
        //normal
        /*$response= new Response($json,200,[
            "Content-Type"=>"application/json"
        ]);
        */

        // advanced reponse using Json reponse
        $response= new JsonResponse($json,200,[],true);

        return $response;
    }


    //To creat another beverage by deserialization
    /**
     * @Route("/api/beverages", name="store_Beverages", methods={"POST"})
     */

     public function addbeverage(Request $request,SerializerInterface $serializer, EntityManagerInterface $em){

        try{
            // get request content
        $jsonIn=$request->getContent();
        //deserialize json 
        $beverage=$serializer->deserialize($jsonIn,Post::Class,'json');

        $em->persist($baverage);
        $em->flush();

        return this.json($beverage,201,['groups'=>'beverage:read']);
        } catch(NotEncodableValueException $e){
            return this.json([
                'status'=>400,
                'message'=>$e->getMessage()
            ],400);
        }
        
     }
} 