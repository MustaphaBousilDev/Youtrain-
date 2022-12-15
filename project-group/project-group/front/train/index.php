<?php 
include "models/cnx.php";
include "phpmailer/mail.php";





// $db=cnx();
// $req=$db->query("select * from ville");
// $req2=$db->query("select * from ville");


if(isset($_POST['send']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $subject=$_POST['subject'];
  $message=$_POST['message'];

  $mail->setFrom($email,$email);
  $mail->addAddress("zianiabdssamad30@gmail.com");
  $mail->Subject= "$name  is send a Message about $subject";
  $mail->Body="<h2>$message</h2>";
  $mail->send();
  if($mail)
  {
   echo "<script>alert('Mail Send')</script>";
   header('location:index.php');
  }

// if($mail)
// {
//   echo "<script>alert('Mail Send')</script>";
//   header('location:index.php');
// }
// else
// {
//   echo "<script>alert('Mail Not Send')</script>";
// }

}


require '../classes/init.php';
$user=new User();
$check_login=$user->check_login();
$voyege=new  Voyege();
$gares=$voyege->get_garre();
$link=isset($_GET['do']) ? $_GET['do'] : '';
echo $link;

if($link=="logout"){
        $logout=$user->logout();
} 


if($_SERVER['REQUEST_METHOD']=="POST"){
    $DB=new Database();
    $error="";
    $arr['depart']=$_POST['depart'];
    $arr['arrivee']=$_POST['arrivee'];
    $arr['date']=$_POST['date'];
    
    
    $query="SELECT voyagess.*, gare.name as departname ,
    ga.name as arrivee_name , all_trains.name as train_name 
    FROM voyagess 
    INNER JOIN gare on voyagess.depart = gare.id 
    INNER JOIN gare as ga on voyagess.arrivee = ga.id 
    INNER JOIN all_trains on voyagess.train_id=all_trains.id
    WHERE date_voyege=:date AND 
    disponible=1 AND depart=:depart 
    AND arrivee=:arrivee";
    $result=$DB->read($query,$arr);
    if(is_array($result)){
      $_SESSION['orders']=$result;
      //  echo "<pre>";
      //  print_r( $_SESSION['orders'][0]['departname']);
      //  echo "</pre>";
      //  die;
      header('Location:../dashboard/ticket.php');
      die;
    }
   
    

    /*echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    if(is_array($result) && count($result) > 0){
        return $result;
    }else{
        $error="Error Something is wrong!";
    }*/

}



?>

<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>

    <link
    rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
    crossorigin="anonymous"
  />
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link href="../dashboard/css/main.css" rel="stylesheet">


    <title>Document</title>
</head>
<style>

</style>
<body class="bg-gray-100 	">
    <nav class="p-3 border-gray-200 rounded bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
        <div class="container flex flex-wrap items-center justify-around mx-auto">
          <a href="#" class="flex items-center">
              <img src="imgs/logo.webp" class="h-6 mr-3 sm:h-10" alt="Logo" />
              <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
          </a>
          <button data-collapse-toggle="navbar-solid-bg" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
          </button>
          <div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
            <ul class="flex flex-col mt-4 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700 justify-around">
              <li>
                <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-white dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Home</a>
              </li>
              <li>
                <a href="#contact" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
              </li>
              <li>
                 <?php if(isset($_SESSION['id'])): ?>
                  <a href="../dashboard/profile_users.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Profile</a>
                 <?php else : ?>
                 <a href="../dashboard/login.php" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Sign in</a>
                 <?php endif  ?>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <div class="swiper mySwiper sm:w-12/12 md:w-10/12  mt-8 rounded-lg ">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img
            class="object-cover w-full h-96"
            src="https://cdn.ricardo.com/rail/media/heroes/rail-monitoring-servicesv2.jpg?ext=.jpg"
            alt="apple watch photo"
          />
        </div>
        <div class="swiper-slide">
          <img
            class="object-cover w-full h-96"
            src="https://cdn.ricardo.com/rail/media/heroes/rail-monitoring-servicesv2.jpg?ext=.jpg"
            alt="apple watch photo"
          />
        </div>
        <div class="swiper-slide">
          <img
            class="object-cover w-full h-96"
            src="https://cdn.ricardo.com/rail/media/heroes/rail-monitoring-servicesv2.jpg?ext=.jpg"
            alt="apple watch photo"
          />
        </div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
    <div style="padding:20px" class=" mt-8 h-full 	sm:w-12/12   lg:flex  rounded-lg  font-mono">
    <div style="width:100%;" class=" sm:w-12/12 lg:w-8/12 rounded-tl-lg rounded-bl-lg p-6 bg-white" >
        <h2 class="capitalize font-extrabold text-2xl ui-serif text-orange-500 pb-4">discover your life,<br>travel where you want</h2>
        <?php 
          if(isset($error)){
              echo '<div>'.$error.'</div><br>';
          }
        ?>
    <form class="w-full " method="POST" >
  <div class="grid  grid-rows-4 grid-cols-2 gap-4 p-4 ">
    <div class="">
      <label class="block text-gray-500  font-bold md:text-left  mb-1 md:mb-0 pr-4" for="inline-full-name">
        Gare de départ
      </label>
      <select oninput="get_states(this.value)" name="depart" id="depart" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        <option selected="selected">Gare depart</option>
        <?php foreach($gares as $gare):  ?>
            <option value="<?=$gare['id']?>"><?=$gare['name']?></option>
        <?php endforeach ?>
      </select>  
    </div>
    
    <div class="">
        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
            Gare d'arrivée
        </label>
        
        <select name="arrivee" id="arrivee" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
          <option selected="selected">gare arrive</option>
          <?php foreach($gares as $gare):  ?>
              <option value="<?=$gare['id']?>"><?=$gare['name']?></option>
          <?php endforeach ?>
        </select>  
      </div>
  
    
      <div class="">
        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
            Date Voyege
        </label>

        <div>
            <input name="date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="date" > 
        </div>
      </div>
      
      <div class="col-span-2 " >
        <button type="submit" class=" m-auto block p-3 rounded-lg  font-bold capitalize text-white w-full  text-2xl " style="background: linear-gradient(to right,#ee7724, #d8363a,#dd3675, #b44593 );">rechercher</button>
      </div>
     
     
  </div>

</form>

</div>


<div class="sm:hidden md:block w-4/12 rounded-tr-lg rounded-br-lg" style="background-size: cover; background-repeat: no-repeat; background-position: center; background-image: url('./imgs/train.jpg')">
</div>

</div>
<div class="text-center p-12" id="contact">
    <h2 class="text-center text-4xl font-extrabold text-orange-500 pb-2	">We'd Love To Hear From You</h2>
    <p class="text-center text-black">We're here to help and answer any question you might have. We look forward to hearing from you</p>
</div>
<section class="m-4 ">
<style>
              .contacts-r{width:60%}
              .contacts{display:block;}
              @media screen and (max-width:600px){
                .contacts{display:none}
                .contacts-r{width: 100%;}
              }
            </style>
    <div style="padding:20px;display:flex;background-color:orange" class="  sm:w-12/12  md:w-12/12 lg:w-10/12 m-auto ">
        <div style="width:40%;"  class="contacts   bg-orange-500   text-white rounded-l-lg p-4" >
            <h2 class=" text-center font-bold capitalize text-3xl p-2 pb-3 ">Contact Information</h2>
            <h3 class="pb-4">we are ready to help you when ever you need help</h3>
            
            <div class="flex items-center	 p-4 pl-1 font-bold capitalize text-lg  pb-3  gap-4"><i class="fas fa-phone "></i><p>+2126536648</p></div>
            <div class="flex items-center p-4 pl-1 font-bold capitalize text-lg pb-3 gap-4"><i class="fas fa-envelope"></i><p>interstation@gmail.com</p></div>
            <div class="flex items-center p-4 pl-1 font-bold capitalize text-lg pb-3 gap-4"><i class="fas fa-map-marker-alt"></i><p>africa, morocco</p></div>
        </div>
        <div   class="contacts-r sm:w-12/12 sm:m-auto sm:rounded-l-lg md:w-10/12  bg-white rounded-r-lg ">
            <form action="" method="POST">
            <div class="grid grid-cols-2 grid-rows-3 gap-3 p-4 ">
                <div class="">
                    <label class=" w-full block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Your Name
                    </label>
                    <div>
                        <input class=" w-full appearance-none block bg-gray-200 text-gray-700  border-b-2 border-red-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" name="name" > 
                    </div>
                  </div>
                  <div class="">
                    <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Your Email
                    </label>
                    <div>
                        <input class=" w-full appearance-none block  border-b-2 text-gray-700 bg-gray-200  border-red-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" name="email" > 
                    </div>
                  </div>
                  <div class="col-span-2">
                    <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Your Subject
                    </label>
                    <div>
                        <input class="w-full  appearance-none block border-b-2  bg-gray-200 text-gray-700  border-red-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" name="subject" > 
                    </div>
                  </div>
                  <div class="col-span-2">
                    <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Message
                    </label>
                    <div>
                        <textarea class=" w-full appearance-none block border-b-2  bg-gray-200 text-gray-700   border-red-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" rows="3" id="grid-first-name" type="text" name="message" ></textarea>
                    </div>
                  </div>
                  <div class="col-span-2 " >
                    <button class=" m-auto block p-3 rounded-lg  font-bold capitalize text-white w-full  text-2xl " style="background: linear-gradient(to right,#ee7724, #d8363a,#dd3675, #b44593 );" name="send">send message</button>
                  </div>
                  

        </div>
    </form>

        </div>
     

    </div>
</section>

<div class="text-center p-12">
  <h2 class="text-center text-4xl font-extrabold text-orange-500 pb-5 pt-2	">where are we existe ? </h2>
</div>

<iframe style="padding:20px;width:100%;height:500px" class="w-10/12 m-auto rounded-lg mb-8 " src="https://www.google.com/maps/d/embed?mid=1qLX4WkJ1vQsy48M-DMbZINcVW1cdyYA&ehbc=2E312F" width="640" height="480"></iframe>

   
      
          
<footer class="p-4 bg-white sm:p-6 dark:bg-gray-900">
  <div class="md:flex md:justify-around">
      <div class="mb-6 md:mb-0">
          <a href="https://flowbite.com/" class="flex items-center">
              <img src="./imgs/logo.webp" class="mr-3 h-8 w-20" alt="FlowBite Logo" />
              <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
          </a>
      </div>
      <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
          <div>
              <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Resources</h2>
              <ul class="text-gray-600 dark:text-gray-400">
                  <li class="mb-4">
                      <a href="https://flowbite.com/" class="hover:underline">Flowbite</a>
                  </li>
                  <li>
                      <a href="https://tailwindcss.com/" class="hover:underline">Tailwind CSS</a>
                  </li>
              </ul>
          </div>
          <div>
              <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
              <ul class="text-gray-600 dark:text-gray-400">
                  <li class="mb-4">
                      <a href="https://github.com/themesberg/flowbite" class="hover:underline ">Github</a>
                  </li>
                  <li>
                      <a href="https://discord.gg/4eeurUVvTy" class="hover:underline">Discord</a>
                  </li>
              </ul>
          </div>
          <div>
              <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
              <ul class="text-gray-600 dark:text-gray-400">
                  <li class="mb-4">
                      <a href="#" class="hover:underline">Privacy Policy</a>
                  </li>
                  <li>
                      <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                  </li>
              </ul>
          </div>
      </div>
  </div>
  <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
  <div class="sm:flex sm:items-center sm:justify-between">
      <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.
      </span>
      <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
          <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
              <span class="sr-only">Facebook page</span>
          </a>
          <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
              <span class="sr-only">Instagram page</span>
          </a>
          <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
              <span class="sr-only">Twitter page</span>
          </a>
          <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
              <span class="sr-only">GitHub account</span>
          </a>
          <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" /></svg>
              <span class="sr-only">Dribbbel account</span>
          </a>
      </div>
  </div>
</footer>

     

  




      <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
      <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      function get_states(country){
            console.log(country)
            send_data({id:country.trim()},"get_states");
        }
        function send_data(obj,type){
            var form = new FormData();
            for(key in obj){
                form.append(key,obj[key]);
		    } 
            form.append('data_type',type);
            var ajax = new XMLHttpRequest();
            ajax.addEventListener('readystatechange',function(){
                if(ajax.readyState == 4){
                    if(ajax.status == 200){
                        handle_result(ajax.responseText);
                    }else{
                        alert("an error occured");
                    }
                }
            });
            ajax.open('POST','controller_order.php',true);
            ajax.send(form);
	    }
    function handle_result(result){
		var obj = JSON.parse(result);
        
		if(typeof obj == 'object'){
			if(obj.data_type == 'get_states'){
                let select_arrive=document.getElementById('arrivee');
                console.log('fucktotot');
                console.log(obj.data)
                select_arrive.innerHTML=""
                if(obj.data.length > 0){
                    for(let i=0;i<obj.data.length;i++){
                    select_arrive.innerHTML+=`
                        <option value='${obj.data[i].id}'>${obj.data[i].name}</option>
                    `
                }
                }else{
                    select_arrive.innerHTML+=`
                        <option>Not have any arrivee</option>
                    `
                }
                console.log('totototototototoorr')
                console.log(select_arrive)
                return 
            }
            else
			if(obj.data_type == 'save')
			{
				alert(obj.data);
				send_data({},'read');
			}else
			if(obj.data_type == 'edit')
			{
				alert('fucking succes modifie data')
				//alert(obj.data);
				//send_data({},'read');
			}else
			if(obj.data_type == 'delete')
			{
				//alert(obj.data);
				//send_data({},'read');
			}
		}
	}
    
    function add_order(e){
        e.preventDefault();
        //validate 
        let obj = {};
        let inputs = e.currentTarget.querySelectorAll("input,select");
        //console.log(inputs)
        for (var i = 0; i < inputs.length; i++) {
            obj[inputs[i].id] = inputs[i].value;
            inputs[i].value = "";
        }
        //console.log(obj);
        
        send_data(obj,'save');
        addModal.hide();
    }
      var swiper = new Swiper('.mySwiper', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    </script>

</body>
</html>