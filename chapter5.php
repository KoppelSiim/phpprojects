<!-- Ülesanne 5, Siim Koppel -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap library css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>

<?php
//Tüdrukud
$girls = array("mari", "karin", "elvi","tiina","anna","getter","helis","piret");
sort($girls);
foreach($girls as $name){
    echo "$name<br>";
}
echo "<br>";

//Tüdrukud II
for($i = 0; $i < 3; $i++){
    echo "$girls[$i]<br>";
}
echo "<br>";
$girlsLen = count($girls);
echo $girls[$girlsLen - 1]. "<br>";
$randInt = rand(0, $girlsLen - 1);
echo $girls[$randInt] . "<br>";
echo "<br>";

//Autod 
$cars = array("Subaru","BMW","Acura","Mercedes-Benz","Lexus","GMC","Volvo","Toyota","Volkswagen","Volkswagen","GMC","Jeep","Saab","Hyundai","Subaru","Mercedes-Benz",
"Honda","Kia","Mercedes-Benz","Chevrolet","Chevrolet","Porsche","Buick","Dodge","GMC","Dodge","Nissan","Dodge","Jaguar","Ford","Honda","Toyota","Jeep",
"Kia","Buick","Chevrolet","Subaru","Chevrolet","Chevrolet","Pontiac","Maybach","Chevrolet","Plymouth","Dodge","Nissan","Porsche","Nissan","Mercedes-Benz",
"Suzuki","Nissan","Ford","Acura","Volkswagen","Lincoln","Mazda","BMW","Mercury","Mitsubishi","Ram","Audi","Kia","Pontiac","Toyota","Acura","Toyota","Toyota",
"Chevrolet","Oldsmobile","Acura","Pontiac","Lexus","Chevrolet","Cadillac","GMC","Jeep","Audi","Acura","Acura","Honda","Dodge","Hummer","Chevrolet","BMW",
"Honda","Lincoln","Hummer","Acura","Buick","BMW","Chevrolet","Cadillac","BMW","Pontiac","Audi","Hummer","Suzuki","Mitsubishi","Jeep","Buick","Ford");

$vinCodes = array("1GKS1GKC8FR966658", "1FTEW1C87AK375821", "1G4GF5E30DF760067", "1FTEW1CW9AF114701", "WAUGGAFC8CN433989", "3G5DA03E83S704506", "4JGDA2EB0DA207570", 
"1FTEW1E88AK070552", "SAJWA0F77F8732763", "JHMFA3F21BS660717", "JTHBP5C29C5750730", "WA1LFAFP9DA963060", "3D7TT2CT6BG521976", "WVWN7EE961049", 
"2C3CA5CG3BH341234", "YV4952CFXC162587", "KNALN4D71F5805172", "JN1CV6EK7BM903692", "5FRYD3H84EB186765", "WAUL64B83N441878", "WDDGF4HBXCF845665", 
"WAUKF78E45A133973", "JN1BY0AR2AM022612", "WA1EY74L69D931520", "3GYFNGEYXBS290465", "1D7CW2GK4AS059336", "JN8AZ1FY5EW087447", "WAUBF78E57A343355", 
"SCFFBCCD8AG695133", "WBAWC73548E143482", "3GYFNGE38DS093883", "SCBCP73WC348460", "JN8AE2KPXE9353316", "2C3CDXDT2EH018229", "1G6AH5SX7D0325662", 
"WVWED7AJ7DW431402", "1FTKR1AD3AP316066", "WBAKF5C52CE612586", "1FTNX2A57AE16083", "WAUCFAFR1AA166821", "SCFFDAAM3EG486065", "1G4PR5SK5F4821043", 
"1C3CDFCB4ED858321", "1N6AD0CW8EN722090", "1NXBU4EE0AZ438077", "2T1BPRHE7FC131594", "JH4KB1637C451183", "1C4NJCBA7ED747024", "WAUHF68P86A736691", 
"3D7TT2HT1AG96429", "5GADX23L96D250838", "5FRYD3H25FB985936", "1G4GG5E30DF126304", "KNADH5A38B6072755", "WAUBFAFL1BA477979", "3C63DRL4CG674293", 
"1G6AR5SX0E0834815", "1NXBU4EE2AZ309838", "WAUKGBFB4AN797783", "JN1AJ0HP8AM801887", "WAUPL68E25A448831", "WA1C8BFP3FA535374", "WAUHE78P78A019744", 
"TRURD38J081400551", "1G4HP52K95428171", "5N1CR2MN1EC607241", "5UMDU93417L322773", "1G6AJ5S35F09585", "JN1CV6AP3BM234743", "SCBCR63W66C842051", 
"SCFFDCBD2AG509467", "WBA3C1C58CA664091", "1D7RW2BK6BS922303", "WAUDH98E67A546009", "2HNYB1H46CH683844", "3VW467AT4DM257275", "WDDGF4HB7CA515172", 
"2G61W5S88E9666199", "5GADV33W17D256205", "2C3CDXDT9CH683075", "2G4GU5X0E9989574", "WAUJC58E53A641651", "WDDEJ7KB3CA053774", "3D73M3CL6AG890452", 
"5GAER13D19J026924", "1G4HC5EM1BU329204", "3VWML7AJ6CM772736", "3C6TD4HT2CG011211", "JTDZN3EU2FJ023675", "JN8AZ1MU4CW041721", "KNAFX5A82F5991024", 
"1N6AA0CJ1D57470", "WAUEG98E76A780908", "WAUAF78E96A920706", "1GT01XEG8FZ268942", "1FTEW1CW4AF371278", "JN1AZ4EH8DM531691", "WAUEKAFBXAN294295", 
"1N6AA0EDXFN868772", "WBADW3C59DJ422810");

$carsLen = count($cars);
$vinCodesLen = count($vinCodes);

echo "Cars total: $carsLen<br>";

if($carsLen == $vinCodesLen){
    echo "Arrays have the same length<br>";
}
else{
    echo "Arrays do not have the same length<br>";
}

$toyotaCount = 0;
$audiCount = 0;

for ($i = 0; $i < $carsLen; $i++){
    if ($cars[$i] == "Toyota"){
        $toyotaCount++;
    }
    elseif($cars[$i] == "Audi"){
        $audiCount++;
    }
}
echo "Toyota total: $toyotaCount<br>";
echo "Audi total: $audiCount<br>";
echo "VIN code length less than 17:<br>";
foreach ($vinCodes as $code){
    if(strlen($code) < 17){
        echo "$code<br>";
    }
}
echo "<br>";

// Keskmised palgad
$salary = array(1220,1213,1295,1312,1298,1354,1296,1286,1292,1327,1369,1455);
$average = round(array_sum($salary) / count($salary));
echo "Average salary is $average<br>";
echo "<br>";

//Firmad
$companies = array("Kimia","Mynte","Voomm","Twiyo","Layo","Talane","Gigashots","Tagchat","Quaxo","Voonyx","Kwilith","Edgepulse","Eidel","Eadel","Jaloo","Oyope","Jamia");
asort($companies);
foreach($companies as $company){
    echo "$company<br>";
}
echo "<br>";
$companyToRemove = "Gigashots";
$indexToRemove = array_search($companyToRemove, $companies);
unset($companies[$indexToRemove]);
echo "New array with $companyToRemove removed: <br>";
foreach($companies as $company){
    echo "$company<br>";
}
echo "<br>";

//Riigid
$countries = array("Indonesia","Canada","Kyrgyzstan","Germany","Philippines",
"Philippines","Canada","Philippines","South Sudan","Brazil",
"Democratic Republic of the Congo","Indonesia","Syria","Sweden",
"Philippines","Russia","China","Japan","Brazil","Sweden","Mexico","France",
"Kazakhstan","Cuba","Portugal","Czech Republic"
);
$longestCountryLen = 0;
foreach($countries as $country){
    $countryLen = strlen($country);
    if ($countryLen > $longestCountryLen){
        $longestCountryLen = $countryLen;
    }
}
echo "$longestCountryLen<br>";

//Hiina nimed
$chNames = array("瀚聪","月松","雨萌","展博","雪丽","哲恒","慧妍","博裕","宸瑜","奕漳",
"思宏","伟菘","彦歆","睿杰","尹智","琪煜","惠茜","晓晴","志宸","博豪",
"璟雯","崇杉","俊誉","军卿","辰华","娅楠","志宸","欣妍","明美");

//Extension=intl library must be enabled in php.ini
$collator = new Collator('zh_CN');
// Sort the array using the Collator object
$collator->sort($chNames);
echo $chNames[0]. "<br>";
echo $chNames[(count($chNames)-1)] . "<br>";
echo "<br>";

//Google
$google = array("Feake","Bradwell","Dreger","Bloggett","Lambole","Daish","Lippiett","
Blackie","Stollenbeck","Houseago","Dugall","Sprowson","Kitley","Mcenamin",
"Allchin","Doghartie","Brierly","Pirrone","Fairnie","Seal","Scoffins",
"Galer","Matevosian","DeBlase","Cubbin","Izzett","Ebi","Clohisey",
"Prater","Probart","Samwaye","Concannon","MacLure","Eliet","Kundt","Reyes");

// bool in_array( $val, $array_name, $mode )
//todo forminput
$userToSearch = "Bradwell";
$isInArray = in_array($userToSearch, $google);

if($isInArray){
    $alertType = 'success';
    $msg = $userToSearch. ' is in array';
}
else{
    $alertType = 'danger';
    $msg = $userToSearch. ' is not in array';
}
$message = "<div class='alert alert-$alertType' role='alert'>$msg</div>";
echo $message;
echo "<br>";
//Pildid
//"prentice.jpg","freeland.jpg","peterus.jpg","devlin.jpg","gabriel.jpg","pete.jpg"
$img = array("prentice.jpg","freeland.jpg","peterus.jpg","devlin.jpg","gabriel.jpg","pete.jpg");
echo "<img src = 'img/$img[2]'><br>";
foreach($img as $image){
    echo "<img src = 'img/$image'>";
}
echo "<br>";
?>

<div class="container">
<h1>Image Gallery</h1>

    <div class="row">
    <?php
    // Loop through the array and generate image elements
    foreach ($img as $image) {
        echo '
        <div class="col-md-2">
            <img src="img/' . $image . '" alt="' . $image . '" class="img-fluid">
        </div>';
    }
    ?>
    </div>
</div>


<!-- Bootstrap library javascript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
