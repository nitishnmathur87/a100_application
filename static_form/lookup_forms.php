<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search By City</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/form.css" rel="stylesheet">
    </head>
    <body>
        <div class='container-fluid' id='main'>
        <h3 class="alert-info">Administrator Search and Update Console</h3>
        <div class="container-fluid">
            <div class="col-md-12">
        <div class="col-md-6">
         <div class="row-md-2">   
        <form action="city_lookup.php" method="GET">
            <input type="text" name="city" id="city">
             <input type="submit" name="citySearch"  value="Search User By City">
        </form>
      </div>
            <div class="row-md-2 alert-info spacer"></div>
       <div class="row-md-2">
        <form action="email_lookup.php" method="GET">
            <input type="text" name="email_address" id="email_address">
            <input type="submit" name="submit"  value="Search by Email">
           
        </form>
        </div>
            <div class="row-md-2 alert-info spacer"></div>
       <div class="row-md-2">
        <form action="firstname_lookup.php" method="GET">
             <input type="text" name="first_name" id="first_name">
             <input type="submit" name="action"  value="Search by First Name">
        </form>
        </div>
            <div class="row-md-2 alert-info spacer"></div>
            </div>
                <div class="col-md-6">
       <div class="row-md-2">
        <form action="display_all.php">
            <input type="submit" name="display user" value="Display All">
        </form>
        </div>
                    <div class="row-md-2 alert-info spacer"></div>
        <div class="row-md-2">
        <form action="apprentice_college.php">
            <input type="submit" name="apprentice_college" value="apprentice college display">
        </form>
       </div>
                    <div class="row-md-2 alert-info spacer"></div>
        <div class="row-md-2">
        <form action="update_apprentices.php">
            <input type="submit" name="update_apprentices" value="Apprentices Update">
        </form>
       </div> 
                    <div class="row-md-2 alert-info spacer"></div>
       </div>
                </div>
            </div>
        </div>
    </body>
</html>