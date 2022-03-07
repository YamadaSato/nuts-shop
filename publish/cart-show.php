<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
require 'cart.php';
?>
<style>
{
  list-style: none;
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
.ac {
  width: 70%;
  max-width: 600px;

  
    top: 97%;
    left: 10%;
	
}

.ac-parent {
	position: relative;  /* 追加 */
	height: 50px;
	border-bottom: 1px solid #fff;
	background-color: #f97148;
	color: #fff;
	text-align: center;
	line-height: 50px;
	cursor: pointer;
}

/* ①プラスの横線 */
.ac-parent:before {
	content: "";
	position: absolute;
	top: 50%;
	right: 8px;
	width: 24px;
	height: 2px;
	background: #fff;
	transform: translateY(-50%);
}

/* ②プラスの縦線 */
.ac-parent:after {
	content: "";
	position: absolute;
	top: 50%;
	/* 8px+12px-1px(幅2pxの半分) */
	right: 19px;
	width: 2px;
	height: 24px;
	background: #fff;
	transform: translateY(-50%);
	transition: .3s;
}

/* ③オープン時にopenクラスを付与（縦線を回転させて非表示に） */
.ac-parent.open:after {
	top: 25%;
	opacity: 0;
	transform: rotate(90deg);
}
</style>

<script>
$(function () {
  $('.ac-parent').on('click', function () {
    $(this).next().slideToggle();
    //openクラスをつける
    $(this).toggleClass("open");
    //クリックされていないac-parentのopenクラスを取る
    $('.ac-parent').not(this).removeClass('open');

    // 一つ開くと他は閉じるように
    $('.ac-parent').not($(this)).next('.ac-child').slideUp();
  });
});
		</script>

<dl class="ac">
	<dt class="ac-parent">Q.実寸サイズの計測はどこからどこまでですか？</dt>
	<dd class="ac-child">A.こちらのサイズについてをご参考下さい</dd>
	<dt class="ac-parent">Q.日本サイズでいうとどのくらいですか？</dt>
	<dd class="ac-child">A.こちらの国別サイズ対応表をご参考下さい</dd>
	<dt class="ac-parent">Q.商品の状態を知りたいです</dt>
	<dd class="ac-child">A.商品ページ詳細の【コンディション】に商品状態を記載しております。 また、コンディションについてはこちらのコンディションついてをご参考下さい。</dd>

</dl>
<?php require 'footer.php'; ?>
