
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">  
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: 'Arial';
        }

        .container{
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            background-image: url('https://i.pinimg.com/736x/f8/8a/f4/f88af475db159dd6e6bd670f67804c4b.jpg');
            background-size: cover;
            background-position: center center;
        }

        .message{
            background: cyan;
            padding: 10px;
            width: auto;
            margin-bottom: 10px;
            max-width: 600px;
           
        }

        .time{
            padding-left: 10px;
        }

        .flex-vertical-bottom{
            align-items: flex-end;
        }

        .ghost{
            opacity:0.5;
        }

        .flex-box{
            display: flex;
        }

        .to-right{
            margin: 0 0 0 auto;
        }

        .message-container{
            padding: 5px;
            box-sizing:border-box;
        }

        button{
            width:50px;
            height:50px;
            font-size:25px;
            border:none;
            outline:none;
            cursor:pointer;
        }

        textarea{
            width:100%;
            padding:5px;
            box-sizing:border-box;
            height:50px;
            font-size:20px;
            resize: none;

        }

        form{
            margin:0;

        }

        .textbox{
            width:100%;
        }
    
        
    </style>
</head>
<body>
    <div class='container'>
 
    
    <?php  
    
    $data = json_decode(file_get_contents('/var/www/www-root/data/www/ironlinks.ru/nordic/sofia/nordic6/timon/data.txt'),true);    
    
    function textWrap($text){
				
        //полкучить все слова в тексте
        
        //отрезаем пробелы по краям
        $text = trim($text);

        //разбиваем текст на слова	
        $arr_words = explode(' ',$text);
        
        //в цикле бежим по массиву и смотрим слова
        for($i = 0; $i < count($arr_words);  $i++){
            //если слово больше определенной длины
            if(strlen($arr_words[$i]) >  40 ){
                //пеерзаписали элемент массива
                $arr_words[$i] = mb_strimwidth($arr_words[$i],0,40,'...');     
            }
        }
        
        //склеиваем строку из элементов массива
        $text_fixed = implode(' ',$arr_words);    
        
        return $text_fixed;
    }
    

    ?>


    <?
    foreach($data as $message){ ?>    

            <div class='flex-box message-container';>
    <div class="message <?if($message['id']==4){?> to-right <?}?>  ">
                    <div>
                    <b>
                     <?=$message['first_name']?>
                    </b>
                       
                    </div>

                    <div class='flex-box flex-vertical-bottom '> 
                        <div>
                        <?= textWrap($message['message'])?>           
                        </div>
                        
                        <div class='to-right ghost time'>
                        <?= date('H:i',$message['publ_time'])?>
                        </div>
                    </div>

                </div>
            </div>  
        
    <?} ?>
    
        <a href="" name="textbox"></a>

    <form method="post" action="work.php">  
        
            <input  type="hidden" name="first_name" value="Юрий" />
            <input type="hidden" name="id" value="4" />
        <div class='flex-box'>
            <div class='textbox'>
                <textarea name="message" required></textarea>
            </div>
            
            <div>
                <button>&#10148;</button>          
            </div>
        </div>
        
    </form>
   </div>

</body>



</html>
