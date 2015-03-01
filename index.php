<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link type="text/css" rel="stylesheet" href="styles.css" media="all">
    </head>
    <body>
        <div style="width:100%;text-align: center">
            <img src="gsoc.png" style="width: 72%;"/>
        </div>
        <div class="row">
            <div class="col" style="background-color: #EEAB4C;width: 20%;">
                <div style="text-align: center;color: white;box-sizing: border-box">
                    <ul>
                        <li><a href="?home"><button class="btn">Home</button></a></li>
                        <li><a href="?exercise=1"><button class="btn">Exercise One</button></a></li>
                        <li><a href="?exercise=2"><button class="btn">Exercise Two</button></a></li>
                        <li><a href="?exercise=3"><button class="btn">Exercise Three</button></a></li>
                        <li><a href="?exercise=4"><button class="btn">Exercise Four</button></a></li>
                    </ul>
                </div>
            </div>
            <div class="col" style="width: 52%;background-color: white;">
                <div style="">
                        <?php
                        
                        //checks if any exercise button was clicked
                        if(isset($_GET['exercise']))
                        {
                            //gets and include the appropriate exercise file
                            $exercise = intval(htmlentities(stripslashes($_GET['exercise'])));
                            switch ($exercise)
                            {
                                case 1:
                                    require './exercise_1.php';
                                    break;
                                case 2:
                                    require './exercise_2.php';
                                    break;
                                case 3:
                                    require './exercise_3.php';
                                    break;
                                case 4:
                                    require './exercise_4.php';
                                    break;
                                //includes the home page the wrong exercise number is supplied
                                default :
                                    require './home.php';
                                    break;
                            }
                        }
                        else{
                            require './home.php';
                        }
                        
                        ?>
                </div>
            </div>
        </div>
    </body>
</html>
