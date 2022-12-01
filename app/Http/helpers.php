<?php
use App\Providers\RouteServiceProvider;

  function checkPermission($permissions){

    if (!empty($_SESSION['blah'])){
      // do some thing if the key is exist
      $userAccess = getMyPermission(auth()->user()->level);
    }else{
      //the key does not exist in the session
      return redirect()->route('login');
    }
    
    foreach ($permissions as $key => $value) {
      if($value == $userAccess){
        return true;
      }
    }
    return false;
  }


  function getMyPermission($id)
  {
    switch ($id) {
      case 0:
        return 'admin';
        break;
      case 1:
        return 'pendaftar';
        break;
      case 4:
        return 'peserta';
        break;
      case 5:
        return 'fasil';
        break;  
      default:
        return 'user';
        break;
    }
  }

?>