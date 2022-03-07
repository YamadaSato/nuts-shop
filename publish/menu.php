

<style>
  h1{font-size: 1.5vw;}


</style>










<?php @session_start();?>


<h1>
<a href="index.php">HOME</a>
<?php  if (isset($_SESSION['customer'])) {
	 //  ※ログインしてるか ?>

<a href="favorite-show.php">お気に入り</a>
<a href="history.php">購入履歴</a>
<a href="cart-show.php">カート</a>
<a href="purchase-input.php">購入</a>
<a href="logout-input.php">ログアウト</a>
<a href="customer-input.php">会員情報変更</a>
</h1>

<?php }else{ 
  //ログインしてない ?>

<a href="login-input.php">ログイン</a>
<a href="newcustomer-input.php">新規会員登録</a>


<?php } ?>
<hr>



<meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>


<link href="slick/slick.css" rel="stylesheet">
<link href="slick/slick-theme.css" rel="stylesheet">

<style>
  .multiple-item {
    display: flex;
    height: 300px;
    width: 50%;
  }
  .slick01 { width: 90%; margin: auto;}
  ul{padding: 0;}
  .slider ,.multiple-item{
    margin: 20px auto; width: 80%;
  }
  .slider img,.multiple-item img{
      height: auto;  width: 100%;
  }
  slick-next:before {
      content: '→';
  }
  .slick-prev:before, .slick-next:before {
      font-family: 'slick';
      font-size: 20px;  line-height: 1;
      opacity: .75;    color: #000000;
  }
  .slick-list{max-height:250px} 
  .multiple-item .slick-list{max-height:600px} 
  </style>
<ul class="slider">
<?php
for ($i=1; $i <=10 ; $i++) { 
     # code...
?>

  <li><img src="image/<?=$i?>.jpg" alt="image01"></li>
  

<?php
} ?>
</ul>


<script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
<script src="slick/slick.min.js"></script>



<script>
  $('.slider').slick({
           infinite: true,
           autoplay:true,
           autoplaySpeed:1200,
           dots:true,
           slidesToShow: 4,
           slidesToScroll: 3,
           responsive: [{
                breakpoint: 768,
                     settings: {
                          slidesToShow: 3,
                          slidesToScroll: 3,
                }
           },{
                breakpoint: 900,
                     settings: {
                          slidesToShow: 3,
                          slidesToScroll: 2,
                     }
                }
           ,{
                breakpoint: 520,
                     settings: {
                          slidesToShow: 2,
                          slidesToScroll: 2,
                     }
                }
           ]
      });

</script>


