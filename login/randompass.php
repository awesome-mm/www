<?

function generateRandomPassword($length=8, $strength=0) {

    $vowels = 'aeuy';

    $consonants = 'bdghjmnpqrstvz';

    if ($strength & 1) {

        $consonants .= 'BDGHJLMNPQRSTVWXZ';

    }

    if ($strength & 2) {

        $vowels .= "AEUY";

    }

    if ($strength & 4) {

        $consonants .= '23456789';

    }

    if ($strength & 8) {

        $consonants .= '@#$%';

    }


    $password = '';

    $alt = time() % 2;

    for ($i = 0; $i < $length; $i++) {

        if ($alt == 1) {

            $password .= $consonants[(rand() % strlen($consonants))]; //php rand  랜덤함수 , % 나머지, stralen 문자열의 길이
            // 랜덤 나누기 문자열의 길이를 하고 []안에 담아서 인덱스번호를 이용해서 랜덤으로 숫자를 뽑고 $consonants[index]가 나오니까 인덱스번호에 맞는 문자가 추출된다.

            $alt = 0;

        } else {

            $password .= $vowels[(rand() % strlen($vowels))];

            $alt = 1;

        }

    }

    return $password;

}


$ranpass = generateRandomPassword(8,8);

echo "$ranpass";

?>