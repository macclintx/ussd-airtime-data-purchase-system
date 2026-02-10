<?php 

    $wallet_balance = 2000;


    do{
        
        echo "1. Wallet Balance \n2. Buy Airtime \n3. Buy Data \n4. Exit\n\n";
        $option = readline("Enter option: ");

        //option 1
        if($option == 1){
            echo "\nBalance: KES $wallet_balance\n\n";
        }elseif($option == 2){
           
            $number_valid = false;
           do{

            //check and validate number
                $phone_number = readline("Enter phone number (format: 712345678): "); 
                
                $phone_length = strlen($phone_number);
                echo $phone_length;


                if(  $phone_length != 10 ){
                    echo "\nInvalid format, more or less numbers!\n";
                    
                }elseif($phone_number[0] !== "0" || $phone_number[1] !== "7"){
                    echo "\nInvalid format, number must start with (07) \n";
                }elseif(!ctype_digit($phone_number)){
                    echo "\nPhone number has letters\n";
                }else{

                //check and validate amount2
                $number_valid = true;
                $amount_valid = false;
                do{
                   $amount = readline("Enter amount: ");
                
                    if(!ctype_digit($amount)){
                        echo "Amount is not valid, contains letters\n\n";
                    }elseif($amount < 10){
                        echo "amount must be a multiplier of 5\n\n";

                    }elseif($amount % 5 != 0){
                            echo "Minimum top up amount is 10\n\n";
                    }elseif($amount > $wallet_balance){
                        echo "Not enough money in wallet\n Wallet balance: $wallet_balance\n\n";
                    
                    }
                    else{
                        $amount_valid = true;
                        $wallet_balance -= $amount;
                        echo "Top up KES $amount to $phone_number succesful\n Wallet balance KES $wallet_balance\n\n";   
                    }
                    

                }while(!$amount_valid );

                }

                
           }while(!$number_valid);

         
 
        }elseif($option ==3 ){
            do{
                echo "\n---Offer Bundles---\n1. 500MB - KES 50\n2. 1GB - KES 100\n3. 2GB - KES 180\n";
                $bundle_option = readline("Option: ");

                
                if($bundle_option == 1 ){
                    
                    if($wallet_balance < 50){
                        echo "Insufficient balance.\n Wallet balance: $wallet_balance\n\n";
                        break;
                    }

                    $wallet_balance -= 50;
                    echo "You have succesfully purchased 500MB\n Wallet balance: $wallet_balance\n\n";
                    break;
                }elseif($bundle_option == 2 ){
                    
                   if($wallet_balance < 100){
                     echo "Insufficient balance.\n Wallet balance: $wallet_balance\n\n";
                     break;
                    }
                    
                    $wallet_balance -= 100;
                    echo "You have succesfully purchased 1GB\n Wallet balance: $wallet_balance\n\n";
                    break;
                }elseif($bundle_option == 3){
                    
                   if($wallet_balance < 180){
                        echo "Insufficient balance.\n Wallet balance: $wallet_balance\n\n";
                        break;
                    }
                    
                    $wallet_balance -= 180;
                    echo "You have succesfully purchased 2GB\n Wallet balance: $wallet_balance\n\n";
                    break;
                }else{
                    echo "Invalid Option !\n\n";
                }
            }while($bundle_option < 4);
        }

    }while($option != 4);

    //need to optimize the code