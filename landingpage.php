<!-- Source: https://codesmoker.blogspot.com/2022/01/basic-google-search-landing-page-using.html -->
<!-- https://bap.mediadeveloper.amsterdam/wp-content/uploads/2020/04/07-Encoding-decoding-JSON-Rijksmuseum-API.pdf -->

<?php
$url = 'https://www.rijksmuseum.nl/api/nl/usersets/1866822-masterpiece?key=[Your Key here]&format=json';
$json = file_get_contents($url);
$data = json_decode($json, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Landingpage</title>
    <link rel="stylesheet" href="landingpage.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="wrap">
            <div class="top">
                <a href="#">Link #1</a>
                <a href="#">Link #2</a>
            </div>
            <div class="content">
                <div class="search">
                    <form action="https://duckduckgo.com/">
                        <input type="search" placeholder="Search &hellip;" value="" name="q" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="artworks">
        <?php $works = [];
        foreach ($data['userSet']['setItems'] as $artwork) :
            if (isset($artwork['image']['cdnUrl'])) {
                array_push($works, $artwork['image']['cdnUrl']);
            } ?>
        <?php endforeach; ?>
        <?php
        $k = array_rand($works);
        $image = $works[$k]; ?>
        <img src=<?php echo ($image); ?> />
    </div>
</body>

</html>