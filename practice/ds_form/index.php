<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wizard Form</title>
  <?php include '../style_links.php'?>
    <script src="script.js" defer></script>
  </head>

  <body class="bg-gray-100 font-sans text-sm">
   <?php include 'header.php' ?>
    <div
      class="container mx-auto my-5 grid grid-cols-1 lg:grid-cols-4 gap-0 min-h-screen"
    >
<?php include 'sidebar.php';?> 
<div
        class="bg-white shadow-md rounded-r-lg p-6 lg:col-span-3 border-l border-gray-200"
      >
       <div
  class="bg-white shadow-md rounded-r-lg p-6 lg:col-span-3 border-l border-gray-200"
>
  <div
    class="flex flex-wrap justify-between items-center mb-6 bg-gradient-to-r from-indigo-600 via-indigo-500 to-indigo-400 text-white p-4 rounded-t-md shadow-md"
  >
    <h4 class="text-red-700 font-serif text-base md:text-lg">
      Online Nonimmigrant Visa Application (DS-160)
    </h4>
    <p class="text-sm">
      Application ID: <strong id="applicationId" class="text-red-700"></strong>
    </p>
  </div>



<form id="applicationForm" >

        <main id="dsform-section">
          <div id="step-personal-1"   class="form-step  mt-10 max-w-3xl mx-auto p-6 border border-gray-300 rounded-xl shadow-lg bg-white transition-all duration-300 ease-in-out" >
          <?php include 'personal1.php';?>
        </div>

        <!-- Personal Information 2 -->
        <div id="step-personal-2"      class="form-step hidden mt-10 max-w-3xl mx-auto p-6 border border-gray-300 rounded-xl shadow-lg bg-white transition-all duration-300 ease-in-out">
          <?php include 'personal2.php'; ?>
        </div>

        <!-- Travel Information -->
        <div id="step-travel"  class="form-step hidden mt-10 max-w-3xl mx-auto p-6 border border-gray-400 rounded-lg shadow-md bg-white">
          <?php include 'travelinfm.php'; ?>
        </div>

        <!-- Travel Companions -->
        <div id="step-travel-companions" class="hidden">
          <?php include 'travelcomp.php'; ?>
        </div>

        <!-- Previous Travel -->
        <div id="step-previous-us-travel" class="hidden">
          <?php include 'prevtravel.php'; ?>
        </div>

        <!-- Address and Phone -->
        <div id="step-address-phone" class="hidden">
          <?php include 'address.php'; ?>
        </div>

        <!-- Passport Info -->
        <div id="step-passport" class="hidden">
          <?php include 'passportinfm.php'; ?>
        </div>

        <!-- US Contact -->
        <div id="step-us-contact" class="hidden">
          <?php include 'UScontact.php'; ?>
        </div>

        <!-- Family -->
        <div id="step-relatives" class="hidden">
          <?php include 'faimlyinfm.php'; ?>
        </div>
         <div id="step-spouse" class="hidden">
          <?php include 'spouseinfm.php'; ?>
        </div>

        <!-- Work Present -->
        <div id="step-work-education-present" class="hidden">
          <?php include 'workpres.php';?>
        </div>

        <!-- Work Previous -->
        <div id="step-work-education-previous" class="hidden">
          <?php include 'workprev.php';?>
        </div>

        <!-- Work Additional -->
        <div id="step-work-education-additional" class="hidden">
          <?php include 'workadd.php';?>
        </div>
     <div
            id="step-security-part1"
            class="form-step hidden mt-10 max-w-3xl mx-auto p-6 border border-gray-400 rounded-lg shadow-md bg-white"
          >
          <?php include 'security1.php'?>
</div>
<div
            id="step-security-part2"
            class="form-step hidden mt-10 max-w-3xl mx-auto p-6 border border-gray-400 rounded-lg shadow-md bg-white"
          >
          <?php include 'security2.php'?>
</div>
<div
            id="step-security-part3"
            class="form-step hidden mt-10 max-w-3xl mx-auto p-6 border border-gray-400 rounded-lg shadow-md bg-white"
          >
          <?php include 'security3.php'?>
</div>
<div
            id="step-security-part4"
            class="form-step hidden mt-10 max-w-3xl mx-auto p-6 border border-gray-400 rounded-lg shadow-md bg-white"
          >
          <?php include 'security4.php'?>
</div>
<div
            id="step-security-part5"
            class="form-step hidden mt-10 max-w-3xl mx-auto p-6 border border-gray-400 rounded-lg shadow-md bg-white"
          >
          <?php include 'security5.php' ?>
</div>
   <div
      class="flex flex-col md:flex-row justify-between items-center gap-4 mt-8"
    >
      <button
  id="prev-btn"   
  class="flex items-center gap-2 bg-gray-300 text-black py-2 px-4 rounded hover:bg-gray-400 hidden"
>
  <i class="bi bi-arrow-left"></i>
  Back: Personal 1
</button>


<button
type="button"
  id="next-btn"  
  class="flex items-center gap-2 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700"
>
  Next: Personal 2
  <i class="bi bi-arrow-right"></i>
</button>

    </div>
        </main>
        </form>
      </div>
    </div>
   
    
  </body>
</html>
