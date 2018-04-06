
<?php require_once ('../header/header.php');

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=leboudoir;charset=utf8', 'root', '',array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
         )
        );
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    $resultat = $bdd->query('SELECT * FROM slider ');
    $slider = $resultat->fetch(PDO::FETCH_ASSOC);

    $resultat = $bdd->query('SELECT * FROM products ORDER BY RAND() LIMIT 2');
    $produits = $resultat->fetch(PDO::FETCH_ASSOC);

    $resultat = $bdd->query('SELECT * FROM products ORDER BY RAND() LIMIT 2');
    $products = $resultat->fetch(PDO::FETCH_ASSOC);

?>

<section class="content-fluide">
    <div id="slider">
        <a href="#" class="control_next">></a>
        <a href="#" class="control_prev"><</a>
        <ul>
            <?php foreach ($slider as $slid){?>
            <li><img class="mw-100" src="<?php $slid['picture'] ?>" alt=""></li>
            <?php }?>
        </ul>
    </div>
</section>

<hr class="hrslider">

<section class="content" id="presentation">
<p class="text-center col-12">Lorem Ipsum je slepi tekst, ki se uporablja pri razvoju tipografij in pri pripravi za tisk. Lorem Ipsum je v uporabi že več kot petsto let saj je to kombinacijo znakov neznani tiskar združil v vzorčno knjigo že v začetku 16. stoletja. To besedilo pa ni zgolj preživelo pet stoletij, temveč se je z malenkostnimi spremembami uspešno uveljavilo tudi v elektronskem namiznem založništvu. Na priljubljenosti je Lorem Ipsum pridobil v sedemdesetih letih prejšnjega stoletja, ko so na trg lansirali Letraset folije z Lorem Ipsum odstavki. V zadnjem času se Lorem Ipsum pojavlja tudi v priljubljenih programih za namizno založništvo kot je na primer Aldus PageMaker.</p>

<hr class="hrpresentation">
</section>

<section class="container">
    <div class="row justify-content-around">
        <?php foreach ($produits as $prod){?>
        <div class="article col-md-6">
            <div class="card">
                <img class="card-img-top" src="img/<?= $prod['picture'] ?>" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">
                        Produit: <?php $prod['name'] ?><br>
                        Prix: <?php $prod['price'] ?>
                    </p>
                </div>
            </div>
        </div>
        <?php }?>
    </div>
        <div class="row justify-content-around">
            <?php foreach ($products as $prods){?>
            <div class="article col-md-6">
                <div class="card">
                    <img class="card-img-top" src="<?php $prods['picture'] ?>" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">
                            Produit: <?php $prods['name'] ?><br>
                            Prix: <?php $prods['price'] ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
</section>


<?php require_once ('../footer/footer.php'); ?>