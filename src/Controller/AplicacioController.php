<?php

namespace App\Controller;
use App\Entity\Peliculas;
use App\Form\PeliculaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;

class AplicacioController extends AbstractController
{
    /**
     * @Route("/", name="rootApp")
     */
    public function index()
    {
        return $this->render('aplicacio/index.html.twig');
    }
    /**
     * @Route("/getAll", name="GET_all")
     */
    public function getAll()
    {   $client = HttpClient::create();
        $url="http://localhost:8002/api/peliculas";
        
        $response = $client->request('GET', $url);
        $peliculas=$response->toArray();
        return $this->render('aplicacio/get/all.html.twig',['peliculas'=>$peliculas]);
    }
    /**
     * @Route("/getOne/{id}", name="GET_one")
     */
    public function getOne($id=-1)
    {  
        $client = HttpClient::create();
        $url="http://localhost:8002/api/pelicula/".$id;
        
        $response = $client->request('GET', $url);
        $statusCode = $response->getStatusCode();
        
        

        if(200<=$statusCode && 299>=$statusCode){
            $peliculas=$response->toArray();
            return $this->render('aplicacio/get/one.html.twig',['pelicula'=>$peliculas]);
        }else{
            return $this->render('aplicacio/error.html.twig');
        }
    }
    /**
     * @Route("/getSearch", name="GET_search")
     */
    public function getSearch()
    {  


        return $this->render('aplicacio/get/search.html.twig');
    }

    /**
     * @Route("/deleteSearch", name="DELETE_search")
     */
    public function deleteSearch()
    {  


        return $this->render('aplicacio/delete/search.html.twig');
    }


    /**
     * @Route("/delete/{id}", name="DELETE")
     */
    public function delete($id=-1)
    {  
        $client = HttpClient::create();
        $url="http://localhost:8002/api/pelicula/".$id;
        $response = $client->request('DELETE', $url);
        $statusCode = $response->getStatusCode();

        if(200<=$statusCode && 299>=$statusCode){
            return $this->render('aplicacio/delete/eliminado.html.twig');
        }else{
            return $this->render('aplicacio/error.html.twig');
        }
        
    }

    /**
     * @Route("/post", name="POST")
     */
    public function post(Request $request)
    {  
        $pelicula = new Peliculas();
        
        
        $form = $this->createForm(PeliculaType::class, $pelicula);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){

            $data = $form->getData();
            $nombre=$data->getNombre();
            $descripcion=$data->getDescripcion();

            $client = HttpClient::create();
            $url="http://localhost:8002/api/pelicula";

            $raw='{"nombre":"'.$nombre.'","genero":["LOL"],"descripcion":"'.$descripcion.'"}';



            $response = $client->request('POST', $url,
            ['body' =>$raw]);

            $statusCode = $response->getStatusCode();
          
            if(200<=$statusCode && 299>=$statusCode){
                return $this->redirectToRoute("rootApp");
            }else{
                echo $statusCode;
                echo $nombre."/n";
                echo $descripcion."/n";
                echo $raw;
                return $this->render('aplicacio/error.html.twig');
                
            }

        }
        
        
        return $this->render('aplicacio/post/form_post.html.twig', [
            'form' => $form->createView(),
        ]);
        
    }
    /**
     * @Route("/searchPut", name="PUT_search")
     */
    public function searchPut()
    {  
        return $this->render('aplicacio/put/search.html.twig');
        
    }

     /**
     * @Route("/put/{id}", name="PUT")
     */
    public function put(Request $request, $id=-1)
    {  
        $client = HttpClient::create();
        $url="http://localhost:8002/api/pelicula/".$id;
        
        $response = $client->request('GET', $url);
        $statusCode = $response->getStatusCode();
        
        

        if(200<=$statusCode && 299>=$statusCode){
            $peliculas=$response->toArray();


            $pelicula = new Peliculas();
        
            $pelicula->setNombre($peliculas['nombre']);
            $pelicula->setDescripcion($peliculas['descripcion']);
        
        $form = $this->createForm(PeliculaType::class, $pelicula);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){

            $data = $form->getData();
            $nombre=$data->getNombre();
            $descripcion=$data->getDescripcion();

            $client = HttpClient::create();
            $url="http://localhost:8002/api/pelicula";

            $raw='{"nombre":"'.$nombre.'","genero":["LOL"],"descripcion":"'.$descripcion.'"}';



            $response = $client->request('PUT', $url."/".$id,
            ['body' =>$raw]);

            $statusCode = $response->getStatusCode();
          
            if(200<=$statusCode && 299>=$statusCode){
                return $this->redirectToRoute("rootApp");
            }else{
                echo $statusCode . "\n";
                echo $raw;
                return $this->render('aplicacio/error.html.twig');
                
            }

        }
        
        
        return $this->render('aplicacio/post/form_post.html.twig', [
            'form' => $form->createView(),
        ]);

            
        }else{
            return $this->render('aplicacio/error.html.twig');
        }
        
    }


}