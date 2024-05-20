<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Energia</title>
</head>
<body>
    <?php $conn = new mysqli("localhost", "root","","energiaVol2",3306)?>
    <?php $request = $conn->query("SELECT ID, m, g, h, v FROM energia;")?>
    <form name="formularz2ct" id="formularz2ct" class="lala">
        <select name="dane" id="dane" class="dudu">
            <?php while(list($id,$m,$g,$h,$v)=mysqli_fetch_row($request)){
                $Ek = ($m * ($v * $v))/2;
                $Ep = $m*$g*$v;
                $Em = $Ek * $Ep;
                echo("<option value='Energia kinetyczna = $Ek<br> Energia potencjalna = $Ep<br> Energia mechaniczna = $Em'>$id</option>");
                }?>
        </select>
    </form>
    <?php $conn->close();?>

    <div style="border-radius:20px;width:500px;padding:20px;margin:auto;" id="wynik"></div>
    <script>           
            let odwolanie_do_select = document.getElementById("dane");
            odwolanie_do_select.addEventListener("change", (event)=>{
                if(event.target.value.length!=0){
                    console.log(event.target.value);
                let wynik = document.getElementById("wynik");
                wynik.innerHTML = event.target.value;    
                }
                else{
                    let wynik = document.getElementById("wynik");
                    wynik.innerHTML = "brak danych";
                }
            });
        
    </script>
    
</body>
</html>