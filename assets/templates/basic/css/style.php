<?php
header("Content-Type:text/css");
$color = "#f0f"; // Change your Color Here
$secondColor = "#ff8"; // Change your Color Here

function checkhexcolor($color){
    return preg_match('/^#[a-f0-9]{6}$/i', $color);
}

if (isset($_GET['color']) AND $_GET['color'] != '') {
    $color = "#" . $_GET['color'];
}

if (!$color OR !checkhexcolor($color)) {
    $color = "#336699";
}


function checkhexcolor2($secondColor){
    return preg_match('/^#[a-f0-9]{6}$/i', $secondColor);
}

if (isset($_GET['secondColor']) AND $_GET['secondColor'] != '') {
    $secondColor = "#" . $_GET['secondColor'];
}

if (!$secondColor OR !checkhexcolor2($secondColor)) {
    $secondColor = "#336699";
}
?>

/*------------------------
Css Indexing
--------------------------
@typography
--------------------------
Global css
--------------------------
Preloader
--------------------------
Navbar Area Start
--------------------------
Hero Area Area Start
--------------------------
About Section Start
--------------------------
Feature Area Start
--------------------------
Pricing Section Start
--------------------------
Counter Area Start
--------------------------
Footer Area  Start
--------------------------
About Section Start
--------------------------
Blog Page Start
--------------------------
Blog Details Page Start
--------------------------
Product Details Area Start
--------------------------
Portfolio Area Start
--------------------------
Contact Area Start
--------------------------

-----------------*/
@import url('https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&display=swap');
:root{
--heading-color: #fff;
--para-color: #fff;
--primary-color: <?php echo  $color;?>;
}
body {
font-family: 'Roboto Slab', serif;
font-size: 16px;
padding: 0;
margin: 0;
font-weight: 500;
color: #fff;
background-color: #fff;
}
@keyframes Coin {
from {
transform-origin: 15% 70%;
}


50% {
transform-origin: 30% 50%;
}
to {
transform-origin: 15% 70%;
}
}

@keyframes bdAnim {
from {
-webkit-transform: rotate(0deg) translateX(10px) rotate(0deg);
}
to   {
-webkit-transform: rotate(360deg) translateX(10px) rotate(-360deg);
}
}

@keyframes LineAnim {
from {
transform: scale(1);
}

50% {
transform: scale(1.1);
}

to {
transform: scale(1);
}
}

html{
scroll-behavior: smooth;
}

img {
max-width: 100%;
height: auto;
}

ul, ol {
padding: 0;
margin: 0;
list-style: none;
}

button {
cursor: pointer;
}

button:focus,
input:focus,
textarea:focus,
select:focus {
outline: none;
}

button {
border: none;
}

input, textarea {
padding: 10px 20px;
border: 1px solid #e5e5e5;
}

select {
padding: 10px 20px;
border: 1px solid #e5e5e5;
cursor: pointer;
}

textarea {
min-height: 150px;
resize: none;
}

span {
display: inline-block;
}

h1 {
font-size: 56px;
}

h2 {
font-size: 36px;
}

@media (max-width: 991px) {
h2 {
font-size: 32px;
}
}

@media (max-width: 575px) {
h2 {
font-size: 28px;
}
}

h3 {
font-size: 24px;
}

h4 {
font-size: 18px;
}

h5 {
font-size: 16px;
}

h6 {
font-size: 14px;
}

h1, h2, h3, h4, h5, h6 {
font-family: 'Roboto Slab', serif;
color: var(--heading-color);
font-weight: 700;
margin: 0;
}

h1 > a, h2 > a, h3 > a, h4 > a, h5 > a, h6 > a {
font-family: 'Roboto Slab', serif;
color: var(--heading-color);
font-weight: 700;
}

h1 > a:hover, h2 > a:hover, h3 > a:hover, h4 > a:hover, h5 > a:hover, h6 > a:hover {
color: var(--primary-color);
}

p{
font-size: 16px;
color: var(--para-color);
line-height: 1.7;
margin: 0;
font-family: 'Roboto Slab', serif;
}

li{
font-size: 16px;
color: var(--para-color);
line-height: 1.7;
margin: 0;
font-family: 'Roboto Slab', serif;
}

span {
font-size: 13px;
color: #5F717F;
line-height: 1.7;
margin: 0;
font-family: 'Roboto Slab', serif;
}

a {
text-decoration: none;
display: inline-block;
font-family: 'Roboto Slab', serif;
outline: none;
transition: all 0.3s;
}

a:hover {
text-decoration: none;
}

d-flex {
display: -ms-flexbox;
display: -webkit-box;
display: -webkit-flex;
display: flex;
-ms-flex-wrap: wrap;
-webkit-flex-wrap: wrap;
flex-wrap: wrap;
}

.title span {
color: var(--primary-color);
/*text-transform: uppercase;*/
font-size: inherit;
font-family: inherit;
line-height: inherit;
font-weight: inherit;
}

.bg_img {
background-position: center;
background-size: cover;
}

.button-group {
display: inline-flex;
overflow: hidden;
flex-wrap: wrap;
justify-content: center;
}

.btn {
border-radius: 30px;
color: #fff;
font-size: 13px;
line-height: 1.5;
user-select: none;
padding-left: 35px;
padding-right: 35px;
display: inline-block;
font-weight: 400;
text-align: center;
white-space: nowrap;
vertical-align: middle;
transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.mr-1, .mx-1 {
margin-right: 0.25rem !important;
}

.mt-1, .my-1 {
margin-top: 0.25rem !important;
}

.btn-warning {
box-shadow: 0 0 20px rgba(255, 197, 0,0.4);
background: -webkit-linear-gradient(#FFC702, #FFB520);
background: -o-linear-gradient(#FFC702, #FFB520);
background: linear-gradient(#FFC702, #FFB520);
border: none;
}

.btn-danger{
background: -webkit-linear-gradient(<?php echo $color; ?>;, <?php echo $secondColor; ?>;);
background: -o-linear-gradient(<?php echo $color; ?>;, <?php echo $secondColor; ?>;);
background: linear-gradient(<?php echo $color; ?>;, <?php echo $secondColor; ?>;);
box-shadow: 0 0 10px rgba(255, 197, 0,0.4);
border: none;
}

.btn-primary {
background: -webkit-linear-gradient(#262c40, #161B29);
background: -o-linear-gradient(#262c40, #161B29);
background: linear-gradient(#262c40, #161B29);
border: none;
box-shadow: 0 0 10px rgba(0,0,0,0.4);
}

.cmn-btn {
position: relative;
padding: 0 28px;
background-color: #83b93a;
color: #ffffff;
font-size: 18px;
font-weight: 600;
line-height: 50px;
overflow: hidden;
text-transform: capitalize;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
border-radius: 4px;
border: 1px solid transparent;
-webkit-transition: all 0.3s;
transition: all 0.3s;
z-index: 1;
}

.cmn-btn::before ,.cmn-btn::after{
position: absolute;
width: 100%;
height: 100%;
top: 0;
content: '';
background-color: #83b93a;
z-index: -1;
-webkit-transition: all ease 0.3s;
-moz-transition: all ease 0.3s;
transition: all ease 0.3s;
}

.cmn-btn::before{
right: 50%;
}

.cmn-btn::after{
left: 50%;
}

.cmn-btn:hover::after {
left: 100%;
}

.cmn-btn:hover::before {
right: 100%;
}

.cmn-btn:hover {
border-color: #1c2029;
color: #626262;
background: transparent;
}

.cmn-btn.btn-radius {
border-radius: 5px;
}

.cmn-btn.bg-black {
background-color: #1c2029;
}

.cmn-btn.bg-light {
background-color: #1c2029;
}

.custom-btn{
background: transparent;
color: #626262;
padding: 0;
border: none;
margin-top: 10px;
font-size: 18px;
font-weight: 500;
-webkit-transition: all 0.3s;
transition: all 0.3s;
}

.custom-btn:hover{
border: none;
color: #83b93a;
}

.section-bg {
background-color: #fff;
}

.border-none {
border: none !important;
}

.section-header{
margin-top: -10px;
}

.title{
/*text-transform: uppercase;*/
}

.form-control:focus {
color: #ffffff;
background-color: #21283a;
border-color: #80bdff;
outline: 0;
box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
}

.section-title {
margin: 0;
padding: 0;
font-weight: 700;
font-size: 40px;
text-align: center;
}

.section-title span{
color: var(--primary-color);
font-size: inherit;
font-family: inherit;
line-height: inherit;
font-weight: inherit;
}

.section-header p {
margin-top: 17px;
}

.shadow-none {
-webkit-box-shadow: none;
box-shadow: none;
}

.mb-30 {
margin-bottom: 30px;
}

.mb-60 {
margin-bottom: 60px;
}

.mb-60-none{
margin-bottom: -60px;
}

.mb-30-none{
margin-bottom: -30px;
}

.mt-60 {
margin-top: 60px;
}

.tx{
text-align: right;
}

.mt-50 {
margin-top: 50px;
}

.pb-80{
padding-bottom: 80px;
}

.pt-130 {
padding-top: 130px;
}

@media (max-width: 991px) {
.pt-130 {
padding-top: 90px;
}
}

.pb-130 {
padding-bottom: 130px;
}

@media (max-width: 991px) {
.pb-130 {
padding-bottom: 90px;
}
}

.px-40 {
padding-left: 40px;
padding-right: 40px;
}

@media (max-width: 575px) {
.px-40 {
padding-left: 15px;
padding-right: 15px;
}
}

.content-block .title {
margin-bottom: 25px;
}

.block-area .block-header .title {
margin-bottom: 20px;
font-weight: 700;
margin-top: -5px;
}

.scrollToTop {
position: fixed;
bottom: 0;
right: 30px;
width: 45px;
height: 45px;
border-radius: 5px;
background-color: #83b93a;
color: #fff;
line-height: 45px;
font-size: 20px;
text-align: center;
z-index: 9;
cursor: pointer;
transform: translateY(100%);
}

.scrollToTop.active {
bottom: 30px;
transform: translateY(0%);
}

.scrollToTop:hover{
color: #fff;
}

.navbar-collapse .main-menu li a:hover {
color: var(--primary-color);
}

.preloader {
position: fixed;
width: 100%;
height: 100vh;
z-index: 99999;
overflow: visible;
background: #ffffff url(../images/preloader.gif) no-repeat center center;
background-size: 10.000rem 10.000rem;
}
.video-icon {
z-index: 1;
width: 100px;
height: 100px;
-webkit-border-radius: 50%;
-moz-border-radius: 50%;
border-radius: 50%;
position: absolute;
top: 50%;
left: 50%;
-webkit-transform: translate(-50%, -50%);
-ms-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
background: #83b93a; }
.video-icon a {
display: block;
position: relative;
z-index: 1; }
.video-icon a img {
width: 100%; }
.video-icon::before, .video-icon::after {
position: absolute;
content: "";
width: 100%;
height: 100%;
left: 0;
top: 0;
border-radius: 74px;
background-color: #83b93a;
opacity: 0.15;
z-index: -10; }
.video-icon::before {
z-index: -10;
-webkit-animation: inner-ripple 2000ms linear infinite;
-moz-animation: inner-ripple 2000ms linear infinite;
animation: inner-ripple 2000ms linear infinite; }
.video-icon::after {
z-index: -10;
-webkit-animation: outer-ripple 2000ms linear infinite;
-moz-animation: outer-ripple 2000ms linear infinite;
animation: outer-ripple 2000ms linear infinite; }

@keyframes outer-ripple {
0% {
transform: scale(1);
filter: alpha(opacity=50);
opacity: 0.5;
-webkit-transform: scale(1);
-moz-transform: scale(1);
-ms-transform: scale(1);
-o-transform: scale(1);
-webkit-filter: alpha(opacity=50); }
80% {
transform: scale(1.5);
filter: alpha(opacity=0);
opacity: 0;
-webkit-transform: scale(1.5);
-moz-transform: scale(1.5);
-ms-transform: scale(1.5);
-o-transform: scale(1.5); }
100% {
transform: scale(2.5);
filter: alpha(opacity=0);
opacity: 0;
-webkit-transform: scale(2.5);
-moz-transform: scale(2.5);
-ms-transform: scale(2.5);
-o-transform: scale(2.5); } }
@-webkit-keyframes outer-ripple {
0% {
transform: scale(1);
filter: alpha(opacity=50);
opacity: 0.5;
-webkit-transform: scale(1);
-moz-transform: scale(1);
-ms-transform: scale(1);
-o-transform: scale(1); }
80% {
transform: scale(2.5);
filter: alpha(opacity=0);
opacity: 0;
-webkit-transform: scale(2.5);
-moz-transform: scale(2.5);
-ms-transform: scale(2.5);
-o-transform: scale(2.5); }
100% {
transform: scale(3.5);
filter: alpha(opacity=0);
opacity: 0;
-webkit-transform: scale(3.5);
-moz-transform: scale(3.5);
-ms-transform: scale(3.5);
-o-transform: scale(3.5); } }
@-moz-keyframes outer-ripple {
0% {
transform: scale(1);
filter: alpha(opacity=50);
opacity: 0.5;
-webkit-transform: scale(1);
-moz-transform: scale(1);
-ms-transform: scale(1);
-o-transform: scale(1); }
80% {
transform: scale(2.5);
filter: alpha(opacity=0);
opacity: 0;
-webkit-transform: scale(2.5);
-moz-transform: scale(2.5);
-ms-transform: scale(2.5);
-o-transform: scale(2.5); }
100% {
transform: scale(3.5);
filter: alpha(opacity=0);
opacity: 0;
-webkit-transform: scale(3.5);
-moz-transform: scale(3.5);
-ms-transform: scale(3.5);
-o-transform: scale(3.5); } }
/* inner ripple */
@keyframes inner-ripple {
0% {
transform: scale(1);
filter: alpha(opacity=50);
opacity: 0.5;
-webkit-transform: scale(1);
-moz-transform: scale(1);
-ms-transform: scale(1);
-o-transform: scale(1); }
30% {
transform: scale(1);
filter: alpha(opacity=50);
opacity: 0.5;
-webkit-transform: scale(1);
-moz-transform: scale(1);
-ms-transform: scale(1);
-o-transform: scale(1); }
100% {
transform: scale(1.5);
filter: alpha(opacity=0);
opacity: 0;
-webkit-transform: scale(1.5);
-moz-transform: scale(1.5);
-ms-transform: scale(1.5);
-o-transform: scale(1.5); } }
@-webkit-keyframes inner-ripple {
0% {
transform: scale(1);
filter: alpha(opacity=50);
opacity: 0.5;
-webkit-transform: scale(1);
-moz-transform: scale(1);
-ms-transform: scale(1);
-o-transform: scale(1); }
30% {
transform: scale(1);
filter: alpha(opacity=50);
opacity: 0.5;
-webkit-transform: scale(1);
-moz-transform: scale(1);
-ms-transform: scale(1);
-o-transform: scale(1); }
100% {
transform: scale(1.5);
filter: alpha(opacity=0);
opacity: 0;
-webkit-transform: scale(1.5);
-moz-transform: scale(1.5);
-ms-transform: scale(1.5);
-o-transform: scale(1.5); } }
@-moz-keyframes inner-ripple {
0% {
transform: scale(1);
filter: alpha(opacity=50);
opacity: 0.5;
-webkit-transform: scale(1);
-moz-transform: scale(1);
-ms-transform: scale(1);
-o-transform: scale(1); }
30% {
transform: scale(1);
filter: alpha(opacity=50);
opacity: 0.5;
-webkit-transform: scale(1);
-moz-transform: scale(1);
-ms-transform: scale(1);
-o-transform: scale(1); }
100% {
transform: scale(1.5);
filter: alpha(opacity=0);
opacity: 0;
-webkit-transform: scale(1.5);
-moz-transform: scale(1.5);
-ms-transform: scale(1.5);
-o-transform: scale(1.5); } }

.header-section {
top: 0;
left: 0;
width: 100%;
z-index: 999;
}

.header-top {
background-color: #1B2030;
padding: 4px;
}

@media (max-width: 991px) {
.header-top {
display: none;
}
}

.call-area .phone a:hover{
color: var(--primary-color);
text-decoration: underline;
}

.call-area .phone a{
color: #5F717F;
}

.call-area .phone i {
color: #5F717F;
}

.call-area .support a{
color: #5F717F;
margin-left: 10px;
}

.call-area .support a:hover{
color: var(--primary-color);
text-decoration: underline;
}

.call-area .support i{
color: #5F717F;
margin-left: 10px;
}

.call-area i{
margin-right: 5px;
}

.header-top .social-links{
text-align: right;
}

.social-links li {
display: inline-block;
}

.social-links li a {
display: block;
color: #5f717f;
-webkit-transition: all 0.3s;
transition: all 0.3s;
}

.social-links li a:hover {
color: var(--primary-color);
}

.social-links li + li {
margin-left: 10px;
}

.header-bottom {
background-color: #131722;
width: 100%;
z-index: 999;
padding: 15px 0;
-webkit-transition: all ease 0.3s;
transition: all ease 0.3s;
box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
}

.header-bottom.active {
transform: translateY(0%);
position: fixed;
top: 0;
left: 0;
animation-name: fadeInDown;
animation-duration: 1s;
}

.navbar-expand-lg{
z-index: 10;
}

.site-logo {
position: relative;
top: 0;
}

@media (max-width: 991px) {
.site-logo img {
display: none;
}

.site-name{
margin-left: 0 !important;
}

.navbar{
padding: 10px 0 !important;
}

.title{
font-size: 30px;
text-align: center;
}

.inner-banner-area{
padding-bottom: 60px !important;
}
}

.site-name {
font-weight: 700;
color: #fff;
font-size: 18px;
text-transform: uppercase;
position: relative;
top: 2px;
margin-left: 12px;
margin-right: 12px;
}

.site-name span {
color: var(--primary-color);
font-size: 18px;
}

.fa-bars{
background: var(--primary-color);
width: 45px;
height: 45px;
line-height: 45px;
color: #fff;
border: none;
border-radius: 3px;
font-size: 18px;
text-align: center;
}
}

.navbar-collapse {
background-color: #131722;
}

@media (max-width: 767px) {
.navbar-collapse {
max-height: 320px;
overflow: auto;
}
}

@media (max-width: 991px) {
.navbar-collapse .main-menu {
padding: 15px 0;
}
.menu_has_children .sub-menu {
display: none !important;
}
.menu_has_children .sub-menu li {
width: 100% ;
}
.navbar-collapse .main-menu .menu_has_children.show .sub-menu ,
.navbar-collapse .main-menu .menu_has_children.show .sub-menu {
display: flex !important;
flex-wrap: wrap;
}
}

.navbar-collapse .main-menu li:last-child .sub-menu {
left: auto;
right: 0;
}

.navbar-collapse .main-menu li {
position: relative;
}

.navbar-collapse .main-menu li:hover .sub-menu {
opacity: 1;
visibility: visible;
top: 100%;
}

.navbar-collapse .main-menu li.menu_has_children {
position: relative;
}

.navbar-collapse .main-menu li.menu_has_children i {
transform: translateY(2px);
margin-left: 5px;
}

@media (max-width: 991px) {
.navbar-collapse .main-menu li.menu_has_children::before {
top: 12px;
right: 15px;
}
}

.navbar-collapse .main-menu li a {
padding: 0 15px;
color: #e5e5e5;
font-weight: 700;
align-items: center;
font-size: 16px;
border-bottom: 2px solid transparent;
}

@media (max-width: 1199px) {
.navbar-collapse .main-menu li a {
padding: 12px 5px;
font-size: 13px;
}
}

.navbar-collapse .main-menu li a:hover {
color: var(--primary-color);
}

@media (max-width: 991px) {
.navbar-collapse .main-menu li a {
padding: 8px 15px;
display: block;
}
}

.navbar-collapse .main-menu li .sub-menu {
position: absolute;
top: 105%;
left: 0;
width: 230px;
background-color: #ffffff;
-webkit-box-shadow: 0 5px 10px 2px rgba(0, 0, 0, 0.1);
box-shadow: 0 5px 10px 2px rgba(0, 0, 0, 0.1);
padding: 10px 0;
opacity: 0;
visibility: hidden;
-webkit-transition: all 0.3s;
transition: all 0.3s;
z-index: 9;
}

.navbar-collapse .main-menu li .sub-menu li a {
color: #777;
padding: 8px 20px;
display: block;
border: none;
}

.navbar-collapse .main-menu li .sub-menu li a:hover {
color: #83b93a;
background-color: rgba(0, 0, 0, 0.05);
}

@media (max-width: 991px) {
.navbar-collapse .main-menu li .sub-menu {
position: initial;
opacity: 1;
visibility: visible;
display: none;
-webkit-transition: none;
transition: none;
}

}

@media (max-width: 991px) {
.navbar-collapse .main-menu li + li a {
border-top: 1px solid rgba(255, 255, 255, 0.15);
}
}

.header-section.menu-fixed .header-bottom {
background-color: #83b93a;
-webkit-box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.25);
box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.25);
}

.navbar-collapse .main-menu li:last-child .sub-menu {
left: auto;
right: 0;
}

.menu-toggle {
margin: 15px 0;
position: relative;
display: block;
width: 35px;
height: 20px;
cursor: pointer;
background: transparent;
border-top: 2px solid #ffffff;
border-bottom: 2px solid #ffffff;
font-size: 0;
-webkit-transition: all 0.25s ease-in-out;
transition: all 0.25s ease-in-out;
}

.menu-toggle.is-active {
border-color: transparent;
}

.menu-toggle::before, .menu-toggle::after {
content: '';
display: block;
width: 100%;
height: 2px;
position: absolute;
top: 50%;
left: 50%;
background: #ffffff;
-webkit-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
transition: -webkit-transform 0.25s ease-in-out;
-webkit-transition: -webkit-transform 0.25s ease-in-out;
transition: transform 0.25s ease-in-out;
transition: transform 0.25s ease-in-out, -webkit-transform 0.25s ease-in-out;
}

.menu-toggle.is-active::before {
-webkit-transform: translate(-50%, -50%) rotate(45deg);
transform: translate(-50%, -50%) rotate(45deg);
}

.menu-toggle.is-active::after {
-webkit-transform: translate(-50%, -50%) rotate(-45deg);
transform: translate(-50%, -50%) rotate(-45deg);
}

.navbar-toggler {
padding-right: 0;
}

.toggle-btn{
padding: 8px 12px;
background-color: var(--primary-color);
color:#ffffff;
font-weight: 500;
text-transform: capitalize;
border: 1px solid transparent;
-webkit-transition: all 0.3s;
transition: all 0.3s;
border-radius: 4px;
}

.body-page{
background: #121622;
}

.banner-area {
padding-top: 80px;
padding-bottom: 40px;
position: relative;
z-index: 2;
background-size: cover;
background-position: center;
overflow: hidden;
}

.banner-area::after {
position: absolute;
content: '';
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: -1;
background-color: #000;
opacity: .8;
}

.banner-area .title{
color: #fff;
/*text-transform: uppercase;*/
margin: 15px 0;
}

.banner-area p{
color: #fff;
margin-bottom: 1rem;
}

.banner-area .btn{
padding: 10px 55px;
font-size: 18px;
}

.coin_main {
position: relative;
left: 70px;
top: -30px;
transform-origin: 100% 0;
transform: rotate(2deg);
animation: Coin 3s infinite linear;
}

.sec-area{
padding: 20px 0;
background-color: #1A2030;
border-bottom: 2px solid var(--primary-color);
}

.inner-banner-area{
padding-top: 70px;
padding-bottom: 95px;
position: relative;
z-index: 2;
background-size: cover;
background-position: center;
}

.inner-banner-area::after{
position: absolute;
content: '';
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: -1;
background-color: #000;
opacity: .5;
}

.inner-page-header {
padding: 125px 0;
background-color: transparent;
position: relative;
overflow: hidden;
}
.inner-page-header-shape {
position: absolute;
bottom: 0;
left: 50%;
min-width: 1930px;
width: 100%;
height: 100%;
z-index: 9;
transform: translateX(-50%);
}
.inner-page-header-shape img {
	height: 100%;
}
.inner-page-header-content {
position: relative;
z-index: 99;
}

.inner-banner-area {
position: relative;
}
#particles-js {
width: 100%;
height: 100%;
background-color: #121622;
background-image: url('');
background-size: cover;
background-position: 50% 50%;
background-repeat: no-repeat;
position: absolute;
top: 0;
left: 0;
}

.investment-plan-area{
padding: 45px 0;
position: relative;
background-image: url("../images/sec2.jpg");
z-index: 2;
background-size: cover;
background-position: center;
}

.investment-plan-area::after{
position: absolute;
content: '';
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: -1;
}

.program-area{
padding: 45px 0;
position: relative;
z-index: 2;
background-size: cover;
background-position: center;
}

.program-area::after{
position: absolute;
content: '';
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: -1;
}

.af_line_wr {
margin-left: 30px;
margin-top: 20px;
}

.af_line {
width: 100%;
height: auto;
position: relative;
margin-bottom: 20px;
display: flex;
flex-wrap: wrap;
justify-content: space-between;
}
@media (max-width: 575px) {
.af_line {
flex-direction: column;
}
.right_line {
text-align: left!important;
padding-left: 35px!important;
}
}
.af_line_wr .af_line:nth-child(odd) .right_line, .af_line_wr .af_line:nth-child(odd) .left_line {
color: var(--primary-color);
}

.left_line {
animation: LineAnim 2s ease infinite;
}

.left_line span:nth-child(1) {
display: inline-block;
border: 1px dashed var(--primary-color);
width: 35px;
height: 35px;
color: #fff;
font-size: 18px;
border-radius: 100%;
text-align: center;
line-height: 32px;
margin-right: 10px;
}

.left_line span:nth-child(2) {
position: relative;
top: -3px;
font-size: 18px;
color: #fff;
}

.af_line_wr .af_line:nth-child(1) .left_line span:nth-child(2)::after {
width: 180%;
}

.left_line span:nth-child(2)::after {
content: '';
display: block;
width: 160%;
height: 1px;
bottom: 0;
position: relative;
float: left;
border: 1px dashed var(--primary-color);
}

.af_line_wr .af_line:nth-child(odd) .right_line, .af_line_wr .af_line:nth-child(odd) .left_line span {
color: var(--primary-color) !important;
font-size: 18px;
}

.right_line {
text-align: center;
background: -webkit-linear-gradient(left, rgba(254, 177, 0,0.2), rgba(254, 177, 0,0));
background: -o-linear-gradient(left, rgba(254, 177, 0,0.2), rgba(254, 177, 0,0));
background: linear-gradient(to right, rgba(254, 177, 0,0.2), rgba(254, 177, 0,0));
font-size: 22px;
font-weight: 700;
padding: 5px 20px;
border-radius: 30px;
position: relative;
overflow: hidden;
}

.program-area .btn-danger{
font-size: 18px;
}

.transaction{
padding: 45px 0;
position: relative;
background-image: url("../images/sec2.jpg");
z-index: 2;
background-size: cover;
background-position: center;
}

.transaction::after{
position: absolute;
content: '';
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: -1;
}

.transaction .transaction-area .nav-tabs {
border-bottom: none;
display: -webkit-inline-box;
display: -ms-inline-flexbox;
display: inline-flex;
position: relative;
left: 50%;
margin-left: -156px;
margin-bottom: 40px;
margin-top: 40px;
height: 50px;
border-radius: 6px;
}

.nav-tabs .nav-item {
margin-bottom: -1px;
}

.transaction .transaction-area .nav-tabs .nav-item .nav-link {
display: inline-block;
color: #fff;
background: transparent;
font-weight: 600;
font-size: 16px;
padding: 14px 0;
text-align: center;
width: 140px;
border-color: #fff;
border-radius: 6px 0 0 6px;
-webkit-transition: all 0.3s ease-in;
-moz-transition: all 0.3s ease-in;
-o-transition: all 0.3s ease-in;
transition: all 0.3s ease-in;
}

.transaction .transaction-area .nav-tabs .nav-item .nav-link:hover, .transaction .transaction-area .nav-tabs .nav-item .nav-link.active {
background: #fff;
color: var(--primary-color);
}

.transaction .transaction-area .nav-tabs .nav-item:last-child .nav-link {
border-radius: 0 6px 6px 0;
}

.tab-pane{
background-color: #1A2030;
}

.tab-content>.active {
display: block;
}

.transaction .transaction-area .tab-content .table {
-webkit-box-shadow: 0px 0px 250px 0px rgba(69, 81, 100, 0.1);
box-shadow: 0px 0px 250px 0px rgba(69, 81, 100, 0.1);
position: relative;
border-radius: 10px;
overflow: hidden;
}

.table {
width: 100%;
margin-bottom: 1rem;
background-color: transparent;
}

table {
border-collapse: collapse;
}

.transaction .transaction-area .tab-content .table thead th {
border: none;
padding: 23px 15px;
font-size: 20px;
font-weight: 500;
color: #fff;
}

.transaction .transaction-area .tab-content .table thead:after {
position: absolute;
content: '';
left: 0;
top: 0;
width: 100%;
height: 80px;
background: #fff;
opacity: .03;
}

.transaction .transaction-area .tab-content .table tbody tr:first-child th {
padding-top: 33px;
}

.transaction .transaction-area .tab-content .table tbody tr th {
border-top: none;
padding-left: 40px;
}

.transaction .transaction-area .tab-content .table tbody tr:first-child td {
padding-top: 47px;
}

.transaction .transaction-area .tab-content .table tbody tr td {
padding: 28px 15px;
border-top: none;
color: #fff;
font-size: 16px;
}

.transaction .transaction-area .tab-content .table:after {
position: absolute;
content: '';
left: 0;
top: 0;
width: 100%;
height: 100%;
background: #fff;
opacity: .1;
z-index: -1;
}
.user-img {
	align-items: center;
}
.user-img img {
width: 50px;
height: 50px;
border-radius: 50px;
overflow: hidden;
margin-right: 20px;
}

.transaction .transaction-area .tab-content .table thead th:first-child {
padding-left: 38px;
}

.transaction .transaction-area .tab-content .table tbody tr th span {
font-size: 16px;
color: #fff;
padding-top: 15px;
font-weight: 500;
}

@media (max-width: 575px) {
.transaction .transaction-area .nav-tabs {
width: 280px;
margin-left: -140px;
}

.transaction .transaction-area .nav-tabs .nav-item:first-child .nav-link {
border-radius: 50px 0 0 50px;
border-right: 1px solid rgba(255, 255, 255, 0.55);
}

.transaction-area .tab-pane {
overflow-y: hidden;
overflow-x: scroll;
}

.transaction-area .table {
width: 900px;
}

.transaction .transaction-area .tab-content .table thead th {
font-size: 16px;
}

.user-img {
display: none;
}
}

.map-area{
padding: 45px 0;
position: relative;
z-index: 2;
background-size: cover;
background-position: center;
}

.map-area::after{
position: absolute;
content: '';
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: -1;
}

.logo-area {
background: #121622;
padding: 50px 0 50px 0;
border-bottom: 2px solid var(--primary-color);
}

.mon_wr {
width: 100%;
height: auto;
position: relative;
display: flex;
overflow: hidden;
}

.mon_title h3 {
font-weight: 700;
font-size: 26px;
position: relative;
}

.mon_title h3::before {
content: '';
display: block;
width: 358px;
height: 73px;
position: absolute;
top: 50px;
left: -100px;
}

.mon_title h3 span {
color: var(--primary-color);
font-size: 26px;
}

.logo-area .btn-danger{
font-size: 18px;
width: 90%;
}

.blog-banner-area {
position: relative;
background: var(--primary-color);
z-index: 2;
background-size: cover;
background-position: center;
}

.blog-banner-area::after {
position: absolute;
content: '';
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: -1;
}

.blog-banner-area img{
max-height: 648px;
}

.blog-post, .blog-category {
margin: 0 0 30px 0;
border: 1px solid #d1d1d1;
-webkit-box-shadow: 8px 8px 0 rgba(0, 0, 0, 0.07);
-moz-box-shadow: 8px 8px 0 rgba(0, 0, 0, 0.07);
box-shadow: 8px 8px 0 rgba(0, 0, 0, 0.07);
}

.item-thumbs {
position: relative;
overflow: hidden;
}

.blog-outer {
padding: 25px 15px;
text-align: center;
}
@media screen and (min-width:576px) {
	.blog-outer {
	padding: 25px 20px;
	}

}
.meta {
display: inline-block;
padding-bottom: 15px;
}

.meta span {
border-bottom: 1px solid <?php echo $color?>;
padding: 8px 4px;
margin: 0 8px 0 0;
display: inline-block;
color: #131722;
}

.meta a {
color: #000;
font-size: 14px;
}

.blog-title {
font-size: 16px;
line-height:26px;
color: #313131;
text-transform: capitalize;
margin: 0px 0;
font-weight: bold;
}

.blog-bottom {
padding: 0 40px;
position: relative;
}

.social-icons ul li {
padding: 0 8px 0 0;
line-height: 52px;
display: inline-block;
}

.social-icons ul li a {
color: #666;
font-size: 18px;
}

.widgets-box {
margin-bottom: 50px;
background: #1a2030;
-webkit-box-shadow: 5px 5px 0 rgba(0, 0, 0, 0.07);
-moz-box-shadow: 5px 5px 0 rgba(0, 0, 0, 0.07);
box-shadow: 5px 5px 0 rgba(0, 0, 0, 0.07);
}

.sidebar-head {
padding: 15px 0 0 0;
text-align: center;
font-size: 18px;
color: <?php echo $color; ?>;;
font-weight: 400;
border-bottom: 1px solid #f1f0f0;
}

.sidebar-head span {
padding: 15px 15px;
position: relative;
color: <?php echo $color; ?>;;
font-size: 18px;
}

.sidebar-head span:after {
background: #dadada;
position: absolute;
top: 100%;
content: "";
width: 100%;
height: 3px;
left: 0;
}

.sidebar-text {
padding: 25px;
margin: 0;
}

.sidebar-post li {
margin-bottom: 20px;
padding-bottom: 20px;
border-bottom: 1px solid #efefef;
}

.image-thumb {
width: 100px;
float: left;
}

.image-thumb img {
width: 90px;
height: 60px;
}

.post-text {
overflow: hidden;
padding: 0 0 0 20px;
}

.post-text h4 {
margin: 0 0 8px 0;
text-transform: capitalize;
font-weight: 400;
font-size: 16px;
color: #131722;
}

.post-text h4 a {
font-family: "Ubuntu",sans-serif;
color: #131722;
font-size: 14px;
font-weight: 700;
line-height: 1.5;
}

.post-text p {
color: #131722;
line-height: 1.5;
margin-bottom: 1rem;
font-family: "Ubuntu",sans-serif;
}

.post-text small {
text-align: left;
}

.post-date {
background: #131722;
font-size: 11px;
font-style: italic;
margin: 0 5px 0 0;
display: inline-block;
padding: 5px 8px;
}

.main-page {
	width: 100%;
	height: auto;
	background: rgba(33, 39, 58,0.8);
	padding: 50px 30px;
	font-size: 14px;
	font-weight: 400;
	line-height: 28px;
}
@media screen and (max-width:500px) {
	.main-page {
		padding: 30px 15px;
	}
	.contact_wrapper form {
		padding: 20px 0 0;
		box-shadow: none;
		background: transparent;
	}
}
.main-page p{
	margin-bottom: 20px;
}

.main-page--style p{
margin-bottom: 0;
}

.plan-area {
position: relative;
display: flex;
width: 100%;
height: auto;
margin-top: 20px;
justify-content: center;
}

.plan-item {
padding-top: 10px;
width: 250px;
min-height: 480px;
position: relative;
overflow: hidden;
border-radius: 5px;
margin: 0 10px 0 0;
text-align: center;
transition: all 1s ease;
z-index: 9;
background-color: #162148;
}
.plan-item::before {
position: absolute;
content: '';
bottom: 0;
left: 0;
height: 100%;
width: 100%;
background-color: var(--primary-color);
clip-path: polygon(29% 49%, 44% 54%, 56% 46%, 72% 48%, 86% 43%, 100% 35%, 100% 100%, 0 100%, 0 55%, 15% 53%);
z-index: -10;
}
.plan-item .dots-area {
position: absolute;
width: 100%;
bottom: 40%;
left: 0;
}
.plan-item .dots-area span {
width: 10px;
height: 10px;
border: 2px solid var(--primary-color);
background-color: #162148;
border-radius: 50%;
}
.plan_name {
font-size: 44px;
color: #fff;
font-weight: 700;
text-shadow: 0 1px 0 #ccc;
}

.plan_day {
text-transform: uppercase;
font-weight: 700;
font-size: 32px;
color: var(--primary-color);
margin: -17px 0 0 0;
}

.plan_pr {
font-weight: 300;
font-size: 18px;
color: #fff;
}

.plan_min {
font-size: 20px;
margin: 80px 0 15px 0;
Color: #fff;
}

.plan_min span {
display: block;
font-weight: 700;
font-size: 24px;
color: #fff;
}

.plan-item .btn-primary{
font-size: 16px;
}

.plan-item:hover {
box-shadow: 0 0 40px rgba(18, 22, 34,0.8);
transform: scale(1.1);
z-index: 2;
}

.card {
background: none;
margin-bottom: 0;
padding: 0 !important;
border: none;
border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 calc(.25rem - 1px) !important;
}

.accordion .card::before {
content: '1';
color: #fff;
border-radius: 5px;
display: inline-block;
box-shadow: 0 0 20px rgba(255, 197, 0,0.4);
background: -webkit-linear-gradient(<?php echo $color; ?>;, <?php echo $secondColor; ?>;);
background: -o-linear-gradient(<?php echo $color; ?>;, <?php echo $secondColor; ?>;);
background: linear-gradient(<?php echo $color; ?>;, <?php echo $secondColor; ?>;);
font-size: 12px;
position: absolute;
width: 30px;
height: 30px;
border-radius: 100%;
text-align: center;
line-height: 30px;
top: 3px;
left: 3px;
}
@media screen and (max-width:500px) {
	.accordion .card::before {
	top: 15px;
}
}
.accordion .card:nth-child(2)::before {
content: '2';
}

.accordion .card:nth-child(3)::before {
content: '3';
}

.accordion .card:nth-child(4)::before {
content: '4';
}

.accordion .card:nth-child(5)::before {
content: '5';
}

.accordion .card:nth-child(6)::before {
content: '6';
}

.accordion .card:nth-child(7)::before {
content: '7';
}

.accordion .card:nth-child(8)::before {
content: '8';
}

.accordion .card:nth-child(9)::before {
content: '9';
}

.accordion .card:nth-child(10)::before {
content: '10';
}

.accordion .card:nth-child(11)::before {
content: '11';
}

.accordion .card:nth-child(12)::before {
content: '12';
}

.accordion .card:nth-child(13)::before {
content: '13';
}

.accordion .card:nth-child(14)::before {
content: '14';
}

.accordion .card:nth-child(15)::before {
content: '15';
}

.accordion .card:nth-child(16)::before {
content: '16';
}

.accordion .card:nth-child(17)::before {
content: '17';
}

.accordion .card:nth-child(18)::before {
content: '18';
}

.accordion .card:nth-child(19)::before {
content: '19';
}

.card-header {
padding: .75rem 0.25rem;
margin-bottom: 0;
background-color: rgba(0,0,0,.03);
border-bottom: 1px solid rgba(0,0,0,.125);
border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 calc(.25rem - 1px) !important;
}

.card-header .btn-link{
white-space: normal;
}

.card button {
display: block;
width: 100%;
font-size: 16px;
height: auto;
text-align: left;
border: none;
margin: 0;
color: var(--primary-color);
background: linear-gradient(to right, rgba(254, 177, 0,0.2), rgba(254, 177, 0,0));
}

.card button:hover{
color: var(--primary-color);
text-decoration: none;
}

.card-body {
background: rgb(18, 22, 34);
border-radius: 20px;
color: #fff;
}

.contact-form-area .section-title{
text-transform: unset;
text-align: left;
color: var(--primary-color);
margin: 15px 0;
padding: 0;
font-size: 24px;
}

.contact-social-area .section-title{
text-transform: unset;
text-align: left;
color: var(--primary-color);
margin: 15px 0;
padding: 0;
font-size: 24px;
}

form .btn-danger{
font-size: 18px;
}

@media (max-width: 767px) {
form .btn-danger{
padding-left: 20px;
padding-right: 20px;
}

.section-title{
font-size: 30px;
}

.plan_name{
font-size: 26px;
margin-bottom: 10px;
}

.plan_day{
font-size: 22px;
}

.footer-area .title{
font-size: 30px !important;
}
}

.form-control:disabled, .form-control[readonly] {
background-color: #3b455f;
opacity: 1;
}

.contact-form-area input[type="text"], .contact-form-area input[name="email"], .contact-form-area input[name="subject"] {
width: 100%;
height: 50px;
margin-bottom: 10px;
border: none;
background: rgb(18, 22, 34);
color: #fff;
border-radius: 50px;
padding-left: 20px;
}

.form-control {
display: block;
width: 100%;
height: calc(2.25rem + 2px);
padding: 0.375rem 0.75rem;
font-size: 1rem;
line-height: 1.5;
color: #495057;
background-color: #fff;
background-clip: padding-box;
border: 1px solid #ced4da;
border-radius: 0.25rem;
transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.contact-form-area textarea[name="message"] {
width: 100%;
height: 120px;
margin-bottom: 10px;
border: none;
background: rgb(18, 22, 34);
color: #fff;
border-radius: 20px;
padding-left: 20px;
padding-top: 15px;
}

.mail-area span{
display: block;
}

.mail-area i{
margin-right: 5px;
}

.mail-area a{
font-size: 16px;
color: #5F717F;
}

strong{
color: var(--primary-color);
}

.rulse-number {
background-color: var(--primary-color);
color: #121622;
border-radius: 50%;
padding: 8px 12px;
margin-right: 10px;
font-size: 14px;
}

.box {
background-color: var(--primary-color);
color: #fff;
width: 150px;
padding: 75px 10px;
padding-bottom: 35px;
margin-top: -90px;
font-size: 24px;
border-radius: 12px;
box-shadow: 0 3px 6px rgba(248, 174, 0, 0.20), 0 3px 6px rgb(222, 134, 164);
}

.box p {
line-height: 10px;
padding-top: 20px;
padding-bottom: 15px;
font-size: 24px;
}

form {
width: 100%;
background-color: #21283A;
padding: 60px 30px;
border-radius: 30px;
box-shadow: 0 3px 6px rgba(2, 12, 47, 0.17), 0 3px 6px rgba(2, 9, 65, 0.3);
}

.form-group {
margin-bottom: 1rem;
}

.col-form-label {
padding-top: calc(.375rem + 1px);
padding-bottom: calc(.375rem + 1px);
margin-bottom: 0;
font-size: inherit;
line-height: 1.5;
}

.form-control {
display: block;
width: 100%;
height: calc(1.5em + .75rem + 2px);
padding: .375rem .75rem;
font-size: 1rem;
font-weight: 400;
line-height: 1.5;
color: #fff;
background-color: transparent;
background-clip: padding-box;
border: 1px dashed var(--primary-color);
border-radius: .25rem;
transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

.form-check label a{
color: #5F717F;
}

.form-group .btn-danger{
font-size: 18px;
color: #fff;
border-radius: 4px;
padding-left: 20px;
padding-right: 20px;
}

.remember .form-check-label a{
color: #5F717F;
}

.remember .form-check-label a:hover{
color: #fff;
}

.login-area{
margin-top: 40px;
}

.login-area a {
background-color: transparent;
padding: 16px 50px;
border: 1px dashed var(--primary-color);
margin: 8px;
color: var(--primary-color);
font-size: 18px;
}

.header-bottom--style{
display: none;
}

.drac{
margin-left: 60px;
}

@media (max-width: 991px) {
.header-bottom--style{
display: block;
}

.copiright p{
text-align: center;
}

.header-bottom{
border-bottom: 2px solid var(--primary-color);
}

.nav-box-area{
display: none;
}

.inner-page-header-content img{
display: none;
}

.plan-area{
display: block;
}

.plan-item {
margin: 0 auto 20px auto;
}

.inner-page-header-shape img{
display: none;
}

.inner-page-header-shape{
background: #1B2030;
}

.drac{
display: none;
}

.af_line_wr{
margin-top: 0;
}

.af_line_wr::before{
display: none;
}

.coin_main{
display: none;
}

.mon_title h3{
text-align: center;
}

.mon_wr{
display: block;
text-align: center;
}

.logo-area .btn-danger{
display: block;
width: 100%;
margin: 0 0 10px 0;
}

.footer-nav .navbar{
justify-content: center;
}

.footer-menu{
text-align: center;
}

.footer-menu .navbar-nav li{
padding: 10px 0;
border-bottom: 1px solid #373535;
width: 100%;
}

.footer-social{
text-align: center;
}

.banner-area{
text-align: center;
}
}

.navbar-expand-lg{
justify-content: center;
}

.footer-area{
padding: 40px 0 0 0;
position: relative;
background-image: url("../images/footer.jpg");
z-index: 2;
background-size: cover;
background-position: center;
}

.footer-area::after{
position: absolute;
content: '';
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: -1;
}

.footer-area .title{
font-size: 40px;
}

.footer-text{
margin-bottom: 30px;
}

.footer-nav{
margin-bottom: 30px;
}

.footer-menu .navbar-nav li a{
color: #5F717F;
padding: 0 15px;
}

.navbar-collapse--style{
background-color: transparent;
}

.navbar-collapse--style .main-menu li a {
padding: 0 15px;
}

.copiright {
background: #121622;
}

.copiright p{
font-weight: 300;
font-size: 12px;
color: #5F717F;
}

.privacy-item{
padding: 20px;
background-color: #1A2030;
border-radius: 5px;
}

.privacy-item .title{
color:  var(--primary-color);
margin-bottom: 20px;
text-align: center;
}

.privacy-item .total-amount{
font-size: 35px;
display: block;
text-align: center;
}

.privacy-btn{
background-color: transparent;
font-size: 18px;
color: #5F717F;
text-decoration: underline;
transition: all 0.3s;
}

.privacy-btn:hover{
color: red;
text-decoration: underline;
}


.input-group-text.copytext {
display: -webkit-box;
display: -ms-flexbox;
display: flex;
-webkit-box-align: center;
-ms-flex-align: center;
align-items: center;
padding: .375rem .75rem;
margin-bottom: 0;
font-size: 1rem;
font-weight: 400;
line-height: 1.5;
color: <?php echo $color;?>;
text-align: center;
white-space: nowrap;
background-color: transparent;
border: 1px dashed <?php echo $color;?>;
border-radius: .25rem;
cursor: pointer;
}

.btn-secondary {
background-color: transparent !important;
}

.dropdown-menu{
background-color: #1A2030;;
color: #5F717F;
}

.dropdown-item:hover {
background: #131722;
}


.modal form {
background-color: transparent;
padding: unset;
border-radius: unset;
}

.modal-content{
background: #33383c;
}
.modal-title{color: #fff}

.btn-round{border-radius: 30px !important;}

.comment-content .comment-author {
color: #c82333;
}
.card-header-bg{
background: #1e2335 !important;
}

.editor-toolbar {
border-top: 1px solid #fbfbfb;
border-left: 1px solid #fbfbfb;
border-right: 1px solid #fbfbfb;
}

.editor-toolbar a {
color: #fbfbfb!important;
}
.CodeMirror {
background: #21283a!important;
color: #fff;
}
.CodeMirror .cm-spell-error:not(.cm-url):not(.cm-comment):not(.cm-tag):not(.cm-word) {
background: transparent;
color: #ddd;
}

.editor-toolbar.fullscreen {
background: #21283a;
}
.editor-toolbar a.active, .editor-toolbar a:hover {
background: #95a5a6;
color: #fcfcfc;
}

.editor-toolbar.fullscreen::before,
.editor-toolbar.fullscreen::after{
background: transparent !important;
}

.custom-success{
background: green !important;
color: #fff !important;
}

.custom-danger{
background: red !important;
color: #fff !important;
}

.addon-bg{
background: #1b2030;
color: #fff;
}

.amr-btn:active,
.amr-btn:focus,
.amr-btn:hover,
.amr-btn {
background: <?php echo $color;?> !important;
border: 1px solid <?php echo $color;?> !important;
color: #fff !important;
padding: 5px;
display: block;
}


.card-deposit {
background: rgb(27, 32, 48);
border-radius: unset;
color: #fff;
}


.card-body-deposit {
background: rgb(27, 32, 48);
}

.color-transparent{
color: transparent !important;
}


.card-body-deposit .list-group-item {
background-color: transparent;
}


.card {
background: rgb(27, 32, 48);
border-radius: unset;
color: #fff;
}


.card-body {
background: rgb(27, 32, 48);
}

.color-transparent{
color: transparent !important;
}


.card-body .list-group-item {
background-color: transparent;
}


.pranto-ul ul, .pranto-ul li { list-style: none; margin: 0; padding: 0; }
.pranto-ul ul { padding-left: 1em;}
.pranto-ul li { padding-left: 1em;
border: 1px dotted #fff;
border-width: 0 0 1px 1px;
}
.pranto-ul li.container { border-bottom: 0px; width: 100%; }
.pranto-ul li.empty { font-style: italic;
color: silver;
border-color: silver;
}
.pranto-ul li p { margin: 0;
background: #121622;
position: relative;
top: 0.5em;
padding-bottom: 0px;
}
.pranto-ul li ul {
border-top: 1px dotted #ffffff;
margin-left: -1em;
padding-left: 2em;
}
.pranto-ul ul li:last-child ul {
border-left: 1px dotted #fff;
margin-left: -17px;
}


@media (min-width: 992px) {
span.site-name {
display: none;
}
}

.subscribe-area{
padding: 45px 0;
}

.subscribe-area .section-title{
margin-bottom: 30px;
}

.subscribe-form input{
position: relative;
width: 100%;
border-radius: 25px;
}

.subscribe-form input[type=submit] {
color: #fff;
cursor: pointer;
padding: 0 30px;
border-radius: 25px;
width: auto;
background: -webkit-linear-gradient(<?php echo $color; ?>;, <?php echo $secondColor; ?>;);
background: -o-linear-gradient(<?php echo $color; ?>;, <?php echo $secondColor; ?>;);
background: linear-gradient(<?php echo $color; ?>;, <?php echo $secondColor; ?>;);
box-shadow: 0 0 10px rgba(255, 197, 0,0.4);
border: none;
		height: 46px;
}
.subscribe-form input[type=submit] {}	
@media screen and (min-width:450px) {
	.subscribe-form {
		padding: 60px 40px;
	}
	.subscribe-form input[type=submit] {
		position: absolute;
		bottom: 60px;
		right: 40px;
	}
}	
@media screen and (max-width:449px) {
	.subscribe-form {
		padding: 30px 20px;
	}
	.subscribe-form input[type=submit] {
		margin-top: 10px;
		width: 100%;
	}
}
@media (max-width: 991px) {
.navbar-collapse .main-menu li a{
text-align: left;
}
.plan-item{
width: 100% !important;
}
.language-select-area{
margin-left: 20px;
}
}

@media (min-width: 575px) {
.footer-menu .navbar-nav {
flex-direction: row;

}
}

@media (max-width: 480px) {
.navbar-expand-lg{
margin-left: 0 !important;
margin-right: 0 !important;
}
}

.btn.focus, .btn:focus{
box-shadow: none;
}
.language-select{
background: transparent;
border: none;
color: rgb(95, 113, 127);
float: right;
padding: 10px 0;
}
.language-select option{
background: #121622;
}


.logo-max {
max-width: 220px !important;
max-height: 50px !important;
}


.website-color{
background: <?php echo  $color;?> !important;
border: 1px solid <?php echo  $color;?> !important;
color: #fff;
}
.website-color:hover,
.website-color:focus{
background: <?php echo  $color;?> !important;
border: 1px solid <?php echo  $color;?> !important;
color: #fff;
}



/*Feature-Section Starts Here*/
.feature-section{
padding: 45px 0;
}
.pos-rel{
position: relative;
}
.feature-item {
max-width: 280px;
margin-left: 30px;
min-height: 230px;
margin-bottom: 55px; }
.feature-item .subtitle {
font-size: 24px;
margin-bottom: 24px;
position: relative;
text-transform: capitalize; }
.feature-item .subtitle::before {
position: absolute;
content: '';
width: 15px;
height: 15px;
-webkit-border-radius: 50%;
-moz-border-radius: 50%;
border-radius: 50%;
background: #e96429;
animation: pulseOne 3s linear infinite;
-webkit-animation: pulseOne 3s linear infinite;
-moz-animation: pulseOne 3s linear infinite;
left: -60px;
top: 4px; }
.feature-item p {
max-width: 260px; }
.feature-item:nth-child(2) .subtitle::before {
position: absolute;
left: -40px;
top: -10px; }
.feature-item:last-child {
margin-bottom: 0;
min-height: 0; }.feature-area.two .feature-item {
margin-left: auto;
text-align: right;
margin-right: 30px; }
.feature-area.two .feature-item p {
margin-left: auto; }
.feature-area.two .feature-item .subtitle::before {
position: absolute;
left: calc(100% + 60px); }
.feature-area.two .feature-item:nth-child(2) .subtitle::before {
position: absolute;
left: calc(100% + 28px); }
.feature-area.two .feature-item:nth-child(3) .subtitle::before {
position: absolute;
top: -18px; }
.feature-area .feature-item:nth-child(3) .subtitle::before {
position: absolute;
top: -18px; }
.feature-wrapper {
margin-top: 60px;
justify-content: center; }
.feature-wrapper .feature-thumb {
position: relative;
width: 505px; }
.feature-wrapper .feature-thumb img {
width: 100%; }
.feature-wrapper .feature-area {
width: calc((100% - 505px) / 2); }
@media (max-width: 1199px) {
.feature-wrapper .feature-thumb {
width: 350px; }
.feature-wrapper .feature-area {
width: calc((100% - 350px) / 2); }
.feature-wrapper .feature-area .feature-item {
min-height: 0;
margin-bottom: 70px; }
.feature-wrapper .feature-area .feature-item:nth-child(1) .subtitle::before {
position: absolute;
top: 9px; }
.feature-wrapper .feature-area .feature-item:last-child {
margin-bottom: 0; }
.feature-wrapper .feature-area.two .feature-item:nth-child(1) .subtitle:before {
position: absolute;
left: calc(100% + 50px); }
.feature-wrapper .feature-area.two .feature-item:nth-child(3) .subtitle:before {
position: absolute;
left: calc(100% + 50px); } }
@media (max-width: 991px) {
.feature-wrapper {
justify-content: space-between;
margin-bottom: -40px; }
.feature-wrapper .feature-thumb {
display: none; }
.feature-wrapper .feature-area {
width: calc(50% - 15px);
margin-bottom: 40px; }
.feature-wrapper .feature-area .feature-item {
margin-bottom: 40px; } }
@media (max-width: 991px) and (min-width: 768px) {
.feature-wrapper .feature-area.two {
position: relative; }
.feature-wrapper .feature-area.two::after {
position: absolute;
content: "";
border-right: 1px dashed #e96429;
height: 100%;
top: 0;
left: calc(100% + 13px); }
.feature-wrapper .feature-area.two .feature-item .subtitle::before {
position: absolute;
left: calc(100% + 36px) !important; }
.feature-wrapper .feature-area .feature-item .subtitle::before {
position: absolute;
left: -54px;
top: 8px !important; } }
@media (max-width: 991px) and (max-width: 767px) {
.feature-wrapper .feature-area {
width: 100%; }
.feature-wrapper .feature-area .feature-item {
max-width: 100%;
padding-left: 40px;
text-align: left;
margin-right: 0;
margin-left: 0; }
.feature-wrapper .feature-area .feature-item p {
max-width: 100%; }
.feature-wrapper .feature-area .feature-item .subtitle::before {
left: -35px !important;
top: 5px !important; } }.feature-thumb .coin-4, .feature-thumb .coin-3 {
bottom: 433px;
left: 196px;
width: 30px;
height: 30px; }
.feature-thumb .coin-4.bela, .feature-thumb .coin-3.bela {
bottom: 458px;
left: 241px;
width: 25px;
height: 25px; }
@media (max-width: 1199px) {
.feature-thumb .coin-4, .feature-thumb .coin-3 {
bottom: 335px;
left: 137px;
width: 20px;
height: 20px; }
.feature-thumb .coin-4.bela, .feature-thumb .coin-3.bela {
bottom: 350px;
left: 165px;
width: 20px;
height: 20px; } }

.coin-3 {
animation: zoomOutSlide2 20s linear infinite;
-webkit-animation: zoomOutSlide2 20s linear infinite;
-moz-animation: zoomOutSlide2 20s linear infinite;
animation-delay: 15s;
-webkit-animation-delay: 15s;
-moz-animation-delay: 15s;
}
.coin-4.two, .coin-3.two {
animation-delay: 10s;
-webkit-animation-delay: 10s;
-moz-animation-delay: 10s;
}
.coin-4.three, .coin-3.three {
animation-delay: 5s;
-webkit-animation-delay: 5s;
-moz-animation-delay: 5s;
}
.coin-4, .coin-3 {
width: 22px;
height: 22px;
position: absolute;
bottom: 120px;
z-index: 2;
animation: zoomOutSlide 20s linear infinite;
-webkit-animation: zoomOutSlide 20s linear infinite;
-moz-animation: zoomOutSlide 20s linear infinite;
left: 100px;
}

@keyframes zoomOutSlide {
0% {
-webkit-transform: translate(0);
-ms-transform: translate(0);
transform: translate(0);
}

100% {
-webkit-transform: translateY(-200px) translateX(-50px) scale(0.4);
-ms-transform: translateY(-200px) translateX(-50px) scale(0.4);
transform: translateY(-200px) translateX(-50px) scale(0.4);
opacity: 0;
}
}

@keyframes zoomOutSlide2 {
0% {
-webkit-transform: translate(0);
-ms-transform: translate(0);
transform: translate(0);
}

100% {
-webkit-transform: translateY(-200px) translateX(50px) scale(0.4);
-ms-transform: translateY(-200px) translateX(50px) scale(0.4);
transform: translateY(-200px) translateX(50px) scale(0.4);
opacity: 0;
}
}
@keyframes pulseOne {
0% {
box-shadow: 0 0 0 0 rgba(233, 100, 41, 0.851), 0 0 0 0 rgba(233, 100, 41, 0.851);
-webkit-box-shadow: 0 0 0 0 rgba(233, 100, 41, 0.851), 0 0 0 0 rgba(233, 100, 41, 0.851);
-moz-box-shadow: 0 0 0 0 rgba(233, 100, 41, 0.851), 0 0 0 0 rgba(233, 100, 41, 0.851);
}

40% {
box-shadow: 0 0 0 20px rgba(233, 100, 41, 0), 0 0 0 0 rgba(233, 100, 41, 0.851);
-webkit-box-shadow: 0 0 0 20px rgba(233, 100, 41, 0), 0 0 0 0 rgba(233, 100, 41, 0.851);
-moz-box-shadow: 0 0 0 20px rgba(233, 100, 41, 0), 0 0 0 0 rgba(233, 100, 41, 0.851);
}

80% {
box-shadow: 0 0 0 20px rgba(233, 100, 41, 0), 0 0 0 20px rgba(233, 100, 41, 0);
-webkit-box-shadow: 0 0 0 20px rgba(233, 100, 41, 0), 0 0 0 20px rgba(233, 100, 41, 0);
-moz-box-shadow: 0 0 0 20px rgba(233, 100, 41, 0), 0 0 0 20px rgba(233, 100, 41, 0);
}

100% {
box-shadow: 0 0 0 0 rgba(233, 100, 41, 0), 0 0 0 0 rgba(233, 100, 41, 0);
-webkit-box-shadow: 0 0 0 0 rgba(233, 100, 41, 0), 0 0 0 0 rgba(233, 100, 41, 0);
-moz-box-shadow: 0 0 0 0 rgba(233, 100, 41, 0), 0 0 0 0 rgba(233, 100, 41, 0);
}
}

@-webkit-keyframes pulseOne {
0% {
box-shadow: 0 0 0 0 rgba(233, 100, 41, 0.851), 0 0 0 0 rgba(233, 100, 41, 0.851);
-webkit-box-shadow: 0 0 0 0 rgba(233, 100, 41, 0.851), 0 0 0 0 rgba(233, 100, 41, 0.851);
-moz-box-shadow: 0 0 0 0 rgba(233, 100, 41, 0.851), 0 0 0 0 rgba(233, 100, 41, 0.851);
}

40% {
box-shadow: 0 0 0 20px rgba(233, 100, 41, 0), 0 0 0 0 rgba(233, 100, 41, 0.851);
-webkit-box-shadow: 0 0 0 20px rgba(233, 100, 41, 0), 0 0 0 0 rgba(233, 100, 41, 0.851);
-moz-box-shadow: 0 0 0 20px rgba(233, 100, 41, 0), 0 0 0 0 rgba(233, 100, 41, 0.851);
}

80% {
box-shadow: 0 0 0 20px rgba(233, 100, 41, 0), 0 0 0 20px rgba(233, 100, 41, 0);
-webkit-box-shadow: 0 0 0 20px rgba(233, 100, 41, 0), 0 0 0 20px rgba(233, 100, 41, 0);
-moz-box-shadow: 0 0 0 20px rgba(233, 100, 41, 0), 0 0 0 20px rgba(233, 100, 41, 0);
}

100% {
box-shadow: 0 0 0 0 rgba(233, 100, 41, 0), 0 0 0 0 rgba(233, 100, 41, 0);
-webkit-box-shadow: 0 0 0 0 rgba(233, 100, 41, 0), 0 0 0 0 rgba(233, 100, 41, 0);
-moz-box-shadow: 0 0 0 0 rgba(233, 100, 41, 0), 0 0 0 0 rgba(233, 100, 41, 0);
}
}

@-moz-keyframes pulseOne {
0% {
box-shadow: 0 0 0 0 rgba(233, 100, 41, 0.851), 0 0 0 0 rgba(233, 100, 41, 0.851);
-webkit-box-shadow: 0 0 0 0 rgba(233, 100, 41, 0.851), 0 0 0 0 rgba(233, 100, 41, 0.851);
-moz-box-shadow: 0 0 0 0 rgba(233, 100, 41, 0.851), 0 0 0 0 rgba(233, 100, 41, 0.851);
}

40% {
box-shadow: 0 0 0 20px rgba(233, 100, 41, 0), 0 0 0 0 rgba(233, 100, 41, 0.851);
-webkit-box-shadow: 0 0 0 20px rgba(233, 100, 41, 0), 0 0 0 0 rgba(233, 100, 41, 0.851);
-moz-box-shadow: 0 0 0 20px rgba(233, 100, 41, 0), 0 0 0 0 rgba(233, 100, 41, 0.851);
}

80% {
box-shadow: 0 0 0 20px rgba(233, 100, 41, 0), 0 0 0 20px rgba(233, 100, 41, 0);
-webkit-box-shadow: 0 0 0 20px rgba(233, 100, 41, 0), 0 0 0 20px rgba(233, 100, 41, 0);
-moz-box-shadow: 0 0 0 20px rgba(233, 100, 41, 0), 0 0 0 20px rgba(233, 100, 41, 0);
}

100% {
box-shadow: 0 0 0 0 rgba(233, 100, 41, 0), 0 0 0 0 rgba(233, 100, 41, 0);
-webkit-box-shadow: 0 0 0 0 rgba(233, 100, 41, 0), 0 0 0 0 rgba(233, 100, 41, 0);
-moz-box-shadow: 0 0 0 0 rgba(233, 100, 41, 0), 0 0 0 0 rgba(233, 100, 41, 0);
}
}

.get-profit-section{
padding: 45px 0;
overflow: hidden;
background-color: #1A2030;
}
.get-profit{
margin-top: 180px !important;
}
.get-profit .item .item-thumb {
display: flex;
flex-wrap: wrap;
width: 80px;
height: 80px;
-webkit-border-radius: 50%;
-moz-border-radius: 50%;
border-radius: 50%;
background: #121622;
box-shadow: 0px 0px 14px 6px rgba(46, 25, 204, 0.1);
padding: 8px;
justify-content: center;
align-items: center;
margin-bottom: 22px;
}

.get-profit .item .item-thumb img {
max-width: 100%;
}

.get-profit .thumb img {
width: 100%;
}

@media (min-width: 992px) {
.get-profit {
position: relative;
z-index: 9;
max-width: 650px;
margin: 50px auto 0;
}

.get-profit .item {
position: absolute;
width: 195px;
}

.get-profit .item:nth-child(1) {
bottom: 80px;
right: calc(100% + 3px);
}

.get-profit .item:nth-child(2) {
top: -50px;
left: 50px;
-webkit-transform: translateX(-90%);
-ms-transform: translateX(-90%);
transform: translateX(-90%);
}

.get-profit .item:nth-child(3) {
top: -50px;
right: 0px;
-webkit-transform: translateX(90%);
-ms-transform: translateX(90%);
transform: translateX(90%);
}

.get-profit .item:nth-child(4) {
bottom: 80px;
left: calc(100% + 50px);
}
}

@media screen and (min-width: 992px) and (min-width: 1366px) {
.get-profit {
-webkit-transform: translateX(40px);
-ms-transform: translateX(40px);
transform: translateX(40px);
margin-top: 100px;
}

.get-profit .item:nth-child(1) {
right: calc(100% + 40px);
}

.get-profit .item:nth-child(4) {
left: calc(100% + 40px);
}

.get-profit .item:nth-child(2), .get-profit .item:nth-child(3) {
top: -100px;
}
}

@media (min-width: 992px) and (max-width: 1199px) {
.get-profit {
-webkit-transform: translateX(25px);
-ms-transform: translateX(25px);
transform: translateX(25px);
max-width: 550px;
}

.get-profit .item .item-thumb {
width: 60px;
height: 60px;
padding: 20px;
}

.get-profit .item .subtitle {
font-size: 20px;
}
}

@media (max-width: 991px) {
.get-profit {
margin-bottom: -36px;
}

.get-profit .item {
margin-bottom: 30px;
text-align: center;
}

.get-profit .item .item-thumb {
margin-left: auto;
margin-right: auto;
}
}

.coin-only,
.man-coin,
.star-5,
.star-4,
.star-2,
.star-3,
.circle-1,
.circle-2,
.circle-3,
.trop-1,
.trop-2,
.trop-3,
.trop-4,
.right-circle,
.star-1 {
position: absolute;
z-index: 0;
}

.coin-only img,
.man-coin img,
.star-5 img,
.star-4 img,
.star-2 img,
.star-3 img,
.circle-1 img,
.circle-2 img,
.circle-3 img,
.trop-1 img,
.trop-2 img,
.trop-3 img,
.trop-4 img,
.right-circle img,
.star-1 img {
width: 100%;
}

.circle-1 {
width: 48px;
height: 48px;
}

.circle-1.two {
width: 19px;
height: 19px;
}

.circle-1 {
animation: rotate 5s linear infinite;
-webkit-animation: rotate 5s linear infinite;
-moz-animation: rotate 5s linear infinite;
}

.star-1 {
animation: star 4s linear infinite;
-webkit-animation: star 4s linear infinite;
-moz-animation: star 4s linear infinite;
}

.star-2 {
animation: star 2s linear infinite;
-webkit-animation: star 2s linear infinite;
-moz-animation: star 2s linear infinite;
}

.star-5,
.star-4,
.star-3 {
animation: star 3s linear infinite;
-webkit-animation: star 3s linear infinite;
-moz-animation: star 3s linear infinite;
}

.trop-1 {
animation: trop 10s linear infinite;
-webkit-animation: trop 10s linear infinite;
-moz-animation: trop 10s linear infinite;
}

.trop-2 {
bottom: 30%;
left: 20%;
animation: trop2 10s linear infinite;
-webkit-animation: trop2 10s linear infinite;
-moz-animation: trop2 10s linear infinite;
}

.star-1 {
width: 15px;
height: 15px;
top: 60px;
left: 20%;
}

.star-2 {
width: 15px;
height: 15px;
top: 70px;
right: 20%;
}

.star-2.two {
top: 70%;
left: 70px;
right: auto;
z-index: 9;
}

.star-2.three {
top: 40%;
left: 30px;
right: auto;
z-index: 9;
animation-delay: 1s;
-webkit-animation-delay: 1s;
-moz-animation-delay: 1s;
}

.circle-1 {
top: 80%;
left: 15%;
}

.circle-1.three {
left: 6%;
width: 21px;
height: 21px;
}

.circle-2 {
left: 5%;
top: 30%;
width: 40px;
height: 40px;
}

.circle-2.two {
left: 13%;
top: 20%;
width: 25px;
height: 25px;
}

.circle-2.three {
left: 15%;
top: 38%;
width: 25px;
height: 25px;
}

.circle-2.four {
left: 5%;
top: 60%;
}

.circle-2.five {
left: 15%;
top: 60%;
}

.circle-3 {
right: 30%;
top: 30%;
}

.star-3 {
width: 15px;
height: 15px;
bottom: 40px;
right: 40%;
}

.star-4 {
bottom: 50%;
right: 10%;
}

.star-4.two {
bottom: 40%;
animation-delay: .4s;
-webkit-animation-delay: .4s;
-moz-animation-delay: .4s;
}

.star-4.three {
bottom: 80%;
}

.star-4.four {
bottom: 90%;
right: 40%;
animation-delay: 1s;
-webkit-animation-delay: 1s;
-moz-animation-delay: 1s;
}

.star-4.five {
bottom: 75%;
right: 25%;
animation-delay: .2s;
-webkit-animation-delay: .2s;
-moz-animation-delay: .2s;
}

.star-4.six {
bottom: 60%;
right: 27%;
animation-delay: .6s;
-webkit-animation-delay: .6s;
-moz-animation-delay: .6s;
}

.star-4.seven {
bottom: 50%;
right: 37%;
animation-delay: .8s;
-webkit-animation-delay: .8s;
-moz-animation-delay: .8s;
}

.star-5 {
bottom: 70%;
right: 12%;
animation-delay: 1s;
-webkit-animation-delay: 1s;
-moz-animation-delay: 1s;
}

.trop-3 {
animation: rotate 5s linear infinite;
-webkit-animation: rotate 5s linear infinite;
-moz-animation: rotate 5s linear infinite;
top: 20%;
left: 80%;
}

.trop-4 {
animation: trop 5s linear infinite;
-webkit-animation: trop 5s linear infinite;
-moz-animation: trop 5s linear infinite;
top: 30%;
left: 10%;
}

.coin-only,
.man-coin,
.star-5,
.star-4,
.star-2,
.star-3,
.circle-1,
.circle-2,
.circle-3,
.trop-1,
.trop-2,
.trop-3,
.trop-4,
.right-circle,
.star-1 {
position: absolute;
z-index: 0;
}

.coin-only img,
.man-coin img,
.star-5 img,
.star-4 img,
.star-2 img,
.star-3 img,
.circle-1 img,
.circle-2 img,
.circle-3 img,
.trop-1 img,
.trop-2 img,
.trop-3 img,
.trop-4 img,
.right-circle img,
.star-1 img {
width: 100%;
}

.coin-only {
position: absolute;
content: '';
width: 250px;
bottom: 0;
right: 10px;
}

.coin-only img {
max-width: 100%;
}

.man-only {
position: absolute;
content: '';
width: 160px;
bottom: 140px;
right: 120px;
animation: jump1 5s linear infinite;
-webkit-animation: jump1 5s linear infinite;
-moz-animation: jump1 5s linear infinite;
animation-delay: 2.5s;
-webkit-animation-delay: 2.5s;
-moz-animation-delay: 2.5s;
}

.man-only img {
max-width: 100%;
}

@media screen and (max-width: 1365px) {
.man-only, .coin-only, .man-coin {
display: none;
}
}

@media screen and (min-width: 1366px) and (max-width: 1780px) {
.man-coin {
width: 170px;
bottom: 160px;
}

.coin-only {
width: 100px;
}

.man-only {
width: 70px;
bottom: 154px;
right: 50px;
}
}

@media screen and (min-width: 1366px) and (max-width: 1780px) and (min-width: 1500px) {
.man-coin {
bottom: 190px;
width: 200px;
}

.coin-only {
width: 150px;
}

.man-only {
width: 100px;
bottom: 180px;
right: 60px;
}
}

.left-shape01 {
position: absolute;
width: 20%;
max-width: 314px;
top: 50%;
left: 0;
-webkit-transition: all ease 0.5s;
-moz-transition: all ease 0.5s;
transition: all ease 0.5s;
-webkit-transform: translateY(-50%);
-ms-transform: translateY(-50%);
transform: translateY(-50%);
max-height: 80%;
z-index: 0;
}

.left-shape01 img {
max-width: 100%;
max-height: 100%;
}

.left-shape01.right {
right: 0;
left: auto;
text-align: right;
}

.right-circle {
z-index: 0;
width: 260px;
height: 260px;
right: -4%;
top: 15%;
animation: rotate2 5s linear infinite;
-webkit-border-radius: 50%;
-moz-border-radius: 50%;
border-radius: 50%;
position: absolute;
box-shadow: 0px 0px 46.8px 13.2px rgba(0, 0, 0, 0.05);
background-image: linear-gradient(90deg, #01f7e3 0%, #1796f0 100%);
background-image: -webkit-linear-gradient(90deg, #01f7e3 0%, #1796f0 100%);
background-image: -moz-linear-gradient(90deg, #01f7e3 0%, #1796f0 100%);
}

@media (max-width: 767px) {
.right-circle {
width: 180px;
height: 180px;
}
}

@media (max-width: 575px) {
.right-circle {
width: 100px;
height: 100px;
}
}

.right-circle::after {
width: 80%;
height: 80%;
position: absolute;
content: "";
top: 50%;
left: 50%;
-webkit-transform: translate(-50%, -50%);
-ms-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
background: #f8f6fd;
-webkit-border-radius: 50%;
-moz-border-radius: 50%;
border-radius: 50%;
}

.coin1, .coin2, .shadow1, .shadow2, .man1, .women1 {
position: absolute;
height: auto;
}

.coin1 img, .coin2 img, .shadow1 img, .shadow2 img, .man1 img, .women1 img {
max-width: 100%;
}

@media screen and (max-width: 1749px) {
.coin1, .coin2, .shadow1, .shadow2, .man1, .women1 {
display: none;
}
}

@keyframes trop {
0% {
-webkit-transform: translate(50px, -50px);
-ms-transform: translate(50px, -50px);
transform: translate(50px, -50px);
opacity: 1;
}

100% {
-webkit-transform: translate(200px, -200px);
-ms-transform: translate(200px, -200px);
transform: translate(200px, -200px);
opacity: 0;
}
}

@-webkit-keyframes trop {
0% {
-webkit-transform: translate(50px, -50px);
-ms-transform: translate(50px, -50px);
transform: translate(50px, -50px);
opacity: 1;
}

100% {
-webkit-transform: translate(200px, -200px);
-ms-transform: translate(200px, -200px);
transform: translate(200px, -200px);
opacity: 0;
}
}

@-moz-keyframes trop {
0% {
-webkit-transform: translate(50px, -50px);
-ms-transform: translate(50px, -50px);
transform: translate(50px, -50px);
opacity: 1;
}

100% {
-webkit-transform: translate(200px, -200px);
-ms-transform: translate(200px, -200px);
transform: translate(200px, -200px);
opacity: 0;
}
}

@keyframes rotate {
0% {
-webkit-transform: translate(-50%, -50%) rotate(0deg);
-ms-transform: translate(-50%, -50%) rotate(0deg);
transform: translate(-50%, -50%) rotate(0deg);
}

100% {
-webkit-transform: translate(-50%, -50%) rotate(360deg);
-ms-transform: translate(-50%, -50%) rotate(360deg);
transform: translate(-50%, -50%) rotate(360deg);
}
}

@-moz-keyframes rotate {
0% {
-webkit-transform: translate(-50%, -50%) rotate(0deg);
-ms-transform: translate(-50%, -50%) rotate(0deg);
transform: translate(-50%, -50%) rotate(0deg);
}

100% {
-webkit-transform: translate(-50%, -50%) rotate(360deg);
-ms-transform: translate(-50%, -50%) rotate(360deg);
transform: translate(-50%, -50%) rotate(360deg);
}
}

@-webkit-keyframes rotate {
0% {
-webkit-transform: translate(-50%, -50%) rotate(0deg);
-ms-transform: translate(-50%, -50%) rotate(0deg);
transform: translate(-50%, -50%) rotate(0deg);
}

100% {
-webkit-transform: translate(-50%, -50%) rotate(360deg);
-ms-transform: translate(-50%, -50%) rotate(360deg);
transform: translate(-50%, -50%) rotate(360deg);
}
}

@keyframes rotate2 {
0% {
-webkit-transform: rotate(0deg);
-ms-transform: rotate(0deg);
transform: rotate(0deg);
}

100% {
-webkit-transform: rotate(360deg);
-ms-transform: rotate(360deg);
transform: rotate(360deg);
}
}

@-moz-keyframes rotate2 {
0% {
-webkit-transform: rotate(0deg);
-ms-transform: rotate(0deg);
transform: rotate(0deg);
}

100% {
-webkit-transform: rotate(360deg);
-ms-transform: rotate(360deg);
transform: rotate(360deg);
}
}

@-webkit-keyframes rotate2 {
0% {
-webkit-transform: rotate(0deg);
-ms-transform: rotate(0deg);
transform: rotate(0deg);
}

100% {
-webkit-transform: rotate(360deg);
-ms-transform: rotate(360deg);
transform: rotate(360deg);
}
}

@keyframes rotate3 {
0% {
-webkit-transform: rotate(0deg) translateX(20%);
-ms-transform: rotate(0deg) translateX(20%);
transform: rotate(0deg) translateX(20%);
}

100% {
-webkit-transform: rotate(360deg) translateX(20%);
-ms-transform: rotate(360deg) translateX(20%);
transform: rotate(360deg) translateX(20%);
}
}

@-moz-keyframes rotate3 {
0% {
-webkit-transform: rotate(0deg) translateX(20%);
-ms-transform: rotate(0deg) translateX(20%);
transform: rotate(0deg) translateX(20%);
}

100% {
-webkit-transform: rotate(360deg) translateX(20%);
-ms-transform: rotate(360deg) translateX(20%);
transform: rotate(360deg) translateX(20%);
}
}

@-webkit-keyframes rotate3 {
0% {
-webkit-transform: rotate(0deg) translateX(20%);
-ms-transform: rotate(0deg) translateX(20%);
transform: rotate(0deg) translateX(20%);
}

100% {
-webkit-transform: rotate(360deg) translateX(20%);
-ms-transform: rotate(360deg) translateX(20%);
transform: rotate(360deg) translateX(20%);
}
}

@keyframes rev-rotate {
0% {
-webkit-transform: translate(-50%, -50%) rotate(0deg);
-ms-transform: translate(-50%, -50%) rotate(0deg);
transform: translate(-50%, -50%) rotate(0deg);
}

100% {
-webkit-transform: translate(-50%, -50%) rotate(-360deg);
-ms-transform: translate(-50%, -50%) rotate(-360deg);
transform: translate(-50%, -50%) rotate(-360deg);
}
}

@-webkit-keyframes rev-rotate {
0% {
-webkit-transform: translate(-50%, -50%) rotate(0deg);
-ms-transform: translate(-50%, -50%) rotate(0deg);
transform: translate(-50%, -50%) rotate(0deg);
}

100% {
-webkit-transform: translate(-50%, -50%) rotate(-360deg);
-ms-transform: translate(-50%, -50%) rotate(-360deg);
transform: translate(-50%, -50%) rotate(-360deg);
}
}

@-moz-keyframes rev-rotate {
0% {
-webkit-transform: translate(-50%, -50%) rotate(0deg);
-ms-transform: translate(-50%, -50%) rotate(0deg);
transform: translate(-50%, -50%) rotate(0deg);
}

100% {
-webkit-transform: translate(-50%, -50%) rotate(-360deg);
-ms-transform: translate(-50%, -50%) rotate(-360deg);
transform: translate(-50%, -50%) rotate(-360deg);
}
}

.profit-calc {
position: relative;
overflow: hidden;
padding: 45px 0;
}

@media screen and (min-width: 1366px) and (max-width: 1650px) {
.profit-calc .container {
max-width: 1110px;
}
}

.profit-calc .list {
bottom: 100%;
top: auto;
}

.profil-title {
margin-top: -7px;
font-size: 18px;
font-weight: 400;
font-family: "Roboto", sans-serif;
text-transform: capitalize;
margin-bottom: 14px;
}


.profit-form .form-group {
margin-bottom: 30px;
}

.profit-form .form-group .select-bar {
width: 100%;
height: 50px;
box-shadow: 0px 0px 31.2px 8.8px rgba(0, 0, 0, 0.2);
padding-left: 20px;
}

.profit-form .form-group .select-bar .current {
line-height: 50px;
}

.profit-form .form-group .select-bar .list {
width: 100%;
height: 170px;
overflow-y: scroll;
}

.profit-form .form-group .select-bar * {
color: #777777;
}

.profit-form .form-group input {
color: #777777;
border: 1px solid #ffffff;
padding-left: 20px;
box-shadow: 0px 0px 31.2px 8.8px rgba(0, 0, 0, 0.2);
width: 100%;
}

@media (max-width: 575px) {
.profit-form .form-group {
margin-bottom: 30px;
}
}
.elepsis {
position: absolute;
content: '';
width: 500px;
height: 500px;
bottom: -64px;
right: -100px;
animation: bela 1s linear infinite;
-webkit-animation: bela 1s linear infinite;
-moz-animation: bela 1s linear infinite;
}

@media (max-width: 575px) {
.elepsis {
display: none;
}
}

.elepsis img {
width: 100%;
}
@keyframes bela {
0% {
-webkit-transform: scale(0.98);
-ms-transform: scale(0.98);
transform: scale(0.98);
}

20% {
-webkit-transform: scale(1);
-ms-transform: scale(1);
transform: scale(1);
}

40% {
-webkit-transform: scale(0.98);
-ms-transform: scale(0.98);
transform: scale(0.98);
}

60% {
-webkit-transform: scale(1);
-ms-transform: scale(1);
transform: scale(1);
}

100% {
-webkit-transform: scale(0.95);
-ms-transform: scale(0.95);
transform: scale(0.95);
}
}

@-webkit-keyframes bela {
0% {
-webkit-transform: scale(0.98);
-ms-transform: scale(0.98);
transform: scale(0.98);
}

20% {
-webkit-transform: scale(1);
-ms-transform: scale(1);
transform: scale(1);
}

40% {
-webkit-transform: scale(0.98);
-ms-transform: scale(0.98);
transform: scale(0.98);
}

60% {
-webkit-transform: scale(1);
-ms-transform: scale(1);
transform: scale(1);
}

100% {
-webkit-transform: scale(0.95);
-ms-transform: scale(0.95);
transform: scale(0.95);
}
}

@-moz-keyframes bela {
0% {
-webkit-transform: scale(0.98);
-ms-transform: scale(0.98);
transform: scale(0.98);
}

20% {
-webkit-transform: scale(1);
-ms-transform: scale(1);
transform: scale(1);
}

40% {
-webkit-transform: scale(0.98);
-ms-transform: scale(0.98);
transform: scale(0.98);
}

60% {
-webkit-transform: scale(1);
-ms-transform: scale(1);
transform: scale(1);
}

100% {
-webkit-transform: scale(0.95);
-ms-transform: scale(0.95);
transform: scale(0.95);
}
}
.faq-section{
padding: 45px 0;
}
.faq-header{
margin-bottom: 60px;
}
.call-to-action-section{
padding: 45px 0;
background-color: #1A2030;
}
.call-to-action-content .title{
margin-bottom: 20px;
}
.call-to-action-content p{
width: 80%;
margin: 0 auto;
}
.call-to-action-btn{
margin-top: 40px;
}
.call-to-action-btn .btn-danger{
padding-top: 15px;
padding-bottom: 15px;
font-size: 16px;
}

.counter-section{
padding: 45px 0;
}
.counter-area {
border-radius: 15px;
box-shadow: 0px 0px 14px 6px rgba(144, 12, 236, 0.04);
padding-bottom: 38px;
background-color: #1A2030;
}

.counter-wrapper {
display: flex;
flex-wrap: wrap;
margin-bottom: -80px;
justify-content: center;
margin-top: 40px;
}

.counter-item {
width: 100%;
margin-bottom: 80px;
position: relative;
}

.counter-item .counter-thumb {
clip-path: polygon(75% 0, 100% 50%, 75% 100%, 25% 100%, 0 50%, 25% 0);
width: 100px;
height: 88px;
margin: -40px auto 25px;
display: flex;
flex-wrap: wrap;
background-color: #C82333;
justify-content: center;
align-items: center;
}

.counter-item .counter-thumb i {
font-size: 36px;
color: #ffffff;
display: flex;
justify-content: center;
align-items: center;
}

.counter-item .counter-content {
text-align: center;
}

.counter-item  .odo-area .odo-title {
color: #fff;
display: inline-block;
}
.counter-item  .odo-area .odo-title span {
font-size: inherit;
color: inherit;
}

.counter-item .counter-content p {
font-weight: 500;
}

.counter-item:last-child::after {
display: none;
}

@media (min-width: 576px) {
.counter-item {
width: 50%;
}
}

@media (min-width: 768px) {
.counter-item {
width: 33.33%;
}

.counter-item::after {
position: absolute;
content: "";
width: 1px;
height: calc(100% - 38px);
background: #cbc5f2;
right: 0;
bottom: 0;
}
}

@media (min-width: 992px) {
.counter-item .counter-content .odo-title {
font-size: 40px;
margin-top: -20px;
}
}
.team-section{
padding: 45px 0;
}
.team-header{
margin-bottom: 60px;
}
.team-thumb{
position: relative;
overflow: hidden;
transition: all 0.7s;
}
.team-thumb::before{
position: absolute;
content: '';
top: 0;
left: 0;
width: 100%;
height: 100%;
opacity: .8;
background-color: #1A2030;
-ms-transform: translate(-100%, -100%);
-webkit-transform: translate(-100%, -100%);
transform: translate(-100%, -100%);
transition: all 0.7s;
}
.team-thumb::after{
position: absolute;
content: '';
top: 0;
left: 0;
width: 100%;
height: 100%;
opacity: .8;
background-color: #1A2030;
-ms-transform: translate(100%, 100%);
-webkit-transform: translate(100%, 100%);
transform: translate(100%, 100%);
transition: all 0.7s;
}
.team-thumb:hover::before , .team-thumb:hover::after{
-ms-transform: translate(0%, 0%);
-webkit-transform: translate(0%, 0%);
transform: translate(0%, 0%);
}
.team-content{
padding-top: 20px;
}
.team-content .sub-title{
color: #fff;
font-size: 16px;
}
.team-thumb-overlay {
position: absolute;
padding: 15px 40px;
border-radius: 40px;
width: 100%;
top: 50%;
left: 50%;
transform: translate(-50%, -50%);
opacity: 0;
display: -webkit-box;
display: -ms-flexbox;
-webkit-box-orient: vertical;
-webkit-box-direction: normal;
-ms-flex-flow: row;
flex-flow: row;
-webkit-box-align: center;
-ms-flex-align: center;
align-items: center;
-webkit-box-pack: center;
-ms-flex-pack: center;
justify-content: center;
transition: all 0.5s;
z-index: 9;
}
.team-thumb-overlay .team-social {
display: flex;
}
.team-thumb-overlay .team-social li {
display: inline-block;
transition: all 0.5s;
opacity: 0;
}
.team-thumb-overlay .team-social li:nth-child(2n) {
padding-top: 30px;
}
.team-thumb-overlay .team-social li a {
color: white;
font-size: 18px;
padding: 0 6px;
}
.team-section .team-item:hover .team-thumb-overlay {
opacity: 1;
}
.team-section .team-item:hover .team-thumb-overlay .team-social li {
padding-top: 0;
opacity: 1;
}
.footer-area{
padding: 40px 0 0 0;
position: relative;
background-image: url("../images/footer.jpg");
z-index: 2;
background-size: cover;
background-position: center;
}

.footer-area::after{
position: absolute;
content: '';
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: -1;
}

.footer-area .title{
font-size: 40px;
}

.footer-text{
margin-bottom: 30px;
}

.footer-nav{
margin-bottom: 30px;
}

.footer-menu .navbar-nav li a{
color: #5F717F;
padding: 0 15px;
}

.navbar-collapse--style{
background-color: transparent;
}

.navbar-collapse--style .main-menu li a {
padding: 0 15px;
}

.copiright {
background: #121622;
}

.copiright p{
font-weight: 300;
font-size: 12px;
color: #5F717F;
}
.section-para {
max-width: 720px;
text-align: center;
margin: 0 auto 30px;
}

.mb-30-none {
margin-bottom: -30px;
}
.profit-item {
width: 100%;
text-align: center;
margin-bottom: 30px;
border: 1px solid #e5e5e5;
padding: 30px;
}
.profit-item .profit-thumb {
width: 80px;
height: 80px;
display: -webkit-box;
display: -moz-box;
display: -ms-flexbox;
display: -webkit-flex;
display: flex;
justify-content: center;
align-items: center;
box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
margin: 0 auto 20px;
background: #fff;
border-radius: 50%;
}
.profit-item .profit-content .subtitle {
font-size: 24px;
text-transform: capitalize;
margin-bottom: 15px;
}
.profit-item .profit-content p {
color: rgba(255, 255, 255, .8);
font-size: 14px;
line-height: 24px;
}

.padding-bottom {
padding-bottom : 60px;
}
.padding-top {
padding-top : 60px;
}

.post-item {
margin-bottom: 30px;
}

.post-item .post-thumb {
-webkit-border-radius: 10px 10px 0 0;
-moz-border-radius: 10px 10px 0 0;
border-radius: 10px 10px 0 0;
overflow: hidden;
}
.post-item .post-thumb img {
transition: all ease .3s;
}
.post-item .post-content {
-webkit-border-radius: 0 0 10px 10px;
-moz-border-radius: 0 0 10px 10px;
border-radius: 0 0 10px 10px;
background: #1A2030;
box-shadow: 0px 0px 14px 6px rgba(0, 0, 0, 0.03);
padding: 35px 15px;
}

.post-item .post-content .title {
margin-bottom: 8px;
font-size: 24px;
}
@media screen and (max-width:991px) {
.post-item .post-content .title {
font-size: 18px;
}
}
.post-item .post-content .meta-post {
margin-right: -10px;
margin-bottom: 25px;
}

.post-item .post-content .meta-post li {
padding: 0;
margin-right: 10px;
}

.post-item .post-content .meta-post li i {
margin-right: 5px;
font-size: 12px;
}

.post-item .post-content .meta-post li a {
color: #777777;
font-weight: 500;
align-items: center;
}

.post-item .post-content .entry-content p {
margin-bottom: 32px;
}

.post-item .post-content .entry-content .author {
align-items: center;
}

.post-item .post-content .entry-content .author .author-thumb {
width: 50px;
height: 50px;
margin-right: 20px;
}

.post-item .post-content .entry-content .author .author-thumb a {
display: block;
}

.post-item .post-content .entry-content .author .author-thumb img {
width: 100%;
}

.post-item .post-content .entry-content .author .author-cont {
font-size: 18px;
font-weight: 500;
}

.post-item .post-content .entry-content .author .author-cont a {
color: #777777;
font-family: "Roboto", sans-serif;
}

@media screen and (min-width: 420px) {
.post-item .post-content {
padding: 35px 40px;
}

.post-item .post-content .meta-post {
margin-right: -20px;
}

.post-item .post-content .meta-post li {
margin-right: 20px;
}
}

@media screen and (min-width: 768px) and (max-width: 991px) {
.post-item .post-content {
padding: 35px 20px;
}
}

.post-item:hover .post-thumb img {
-webkit-transform: scale(1.1);
-ms-transform: scale(1.1);
transform: scale(1.1);
}

.post-item:hover .post-content .title a {
color: #860de9;
}

.post-item:hover .post-content a:hover {
color: #860de9;
}




/*Client-Section Starts Here*/

.client-area, .client-slider-section .author, .owl-nav, .slider-area {
display: flex;
flex-wrap: wrap
}
.client-area {
align-items: center;
position: relative;
}

.client-area {
align-items: center;
position: relative;
}

.client-area > * {
width: 100%;
}

@media (min-width: 992px) {
.client-area > * {
width: 50%;
}
.mw-lg-100 {
max-width: 100%;
}
}

.client-area::before {
content: "";
position: absolute;
top: 0;
right: 0;
width: 100%;
height: 100%;
background: url(../../assets/images/client/client-shape.png) no-repeat top right;
}

@media (max-width: 991px) {
.client-area::before {
display: none;
}
}

.client-area .title {
z-index: 1;
position: relative;
}

.client-slider {
position: relative;
overflow: hidden;
}

@media (min-width: 992px) {
.client-slider-section {
max-width: 660px;
}
}

@media screen and (max-width: 1849px) {
.client-slider-section {
padding-right: 30px;
}
}

.client-slider-section .title {
text-transform: capitalize;
margin-bottom: 9px;
}

@media screen and (min-width: 1366px) {
.client-slider-section .title {
margin-bottom: 30px;
}
}

.client-slider-section blockquote {
font-size: 22px;
font-style: italic;
line-height: 35px;
position: relative;
margin-bottom: 40px;
}

@media (max-width: 575px) {
.client-slider-section blockquote {
margin-bottom: 25px;
}
}

.client-slider-section blockquote::before {
content: "";
position: absolute;
top: 50%;
left: 50%;
-webkit-transform: translate(-50%, -50%);
-ms-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
width: 129px;
height: 111px;
background: url(../../assets/images/client/client-quote.png) no-repeat center center;
background-size: contain;
}

.client-slider-section .author {
align-items: center;
}

.client-slider-section .author .author-thumb {
width: 90px;
height: 90px;
-webkit-border-radius: 50%;
-moz-border-radius: 50%;
border-radius: 50%;
overflow: hidden;
}

.client-slider-section .author .author-thumb img {
height: 100%;
max-width: 200%;
width: auto;
}

.client-slider-section .author .author-content {
padding-left: 20px;
}

.client-slider-section .author .author-content span {
color: rgba(255, 255, 255, .8);
}
@media (max-width: 991px) {
.client-slider-section {
text-align: center;
padding-right: 0;
}

.client-slider-section .author {
justify-content: center;
}

.client-slider-section .title {
margin-bottom: 30px;
}
}

@media (max-width: 991px) and (max-width: 767px) and (min-width: 576px) {
.client-slider-section .title {
font-size: 30px;
margin-top: -12px;
line-height: 1.3;
}
}

@media (max-width: 991px) and (max-width: 575px) {
.client-slider-section .title {
margin-bottom: 20px;
}
}

@media screen and (max-width: 1365px) and (min-width: 992px) {
.client-slider-section .title {
font-size: 30px;
margin-top: -12px;
line-height: 1.3;
}
}

.owl-nav {
width: 55px;
position: absolute;
justify-content: space-between;
bottom: 70px;
right: 0;
z-index: 1;
}

.owl-nav i {
font-size: 18px;
font-weight: 700;
}

@media (max-width: 575px) {
.owl-nav {
display: none;
}
}

.owl-nav .owl-prev,
.owl-nav .owl-next {
cursor: pointer;
outline: none;
}

.owl-nav .owl-prev:hover,
.owl-nav .owl-next:hover {
color: #860de9;
}

.owl-nav .owl-next {
color: #860de9;
}

.owl-nav .owl-prev {
-webkit-transform: rotateY(180deg);
-ms-transform: rotateY(180deg);
transform: rotateY(180deg);
}

.client-area .owl-thumbs {
height: 590px;
position: relative;
}

@media (max-width: 991px) {
.client-area .owl-thumbs {
margin-bottom: 50px;
}
}

@media (max-width: 575px) {
.client-area .owl-thumbs {
display: none;
}
}

@media screen and (min-width: 992px) and (max-width: 1365px) {
.client-area .owl-thumbs {
width: 481px;
height: 481px;
margin-right: auto;
margin-left: auto;
}
}

@media (min-width: 1366px) and (max-width: 1849px) {
.client-area .owl-thumbs {
width: 668px;
margin-right: auto;
margin-left: auto;
}
}

.client-area .owl-thumbs .owl-thumb-item {
width: 105px;
height: 92px;
display: none;
-webkit-border-radius: 0;
-moz-border-radius: 0;
border-radius: 0;
position: absolute;
outline: none;
display: none;
}

.client-area .owl-thumbs .owl-thumb-item .thumb {
padding: 20px;
filter: drop-shadow(0px 15px 30px rgba(46, 25, 204, 0.2));
-webkit-filter: drop-shadow(0px 15px 30px rgba(46, 25, 204, 0.2));
}

.client-area .owl-thumbs .owl-thumb-item .thumb img {
z-index: 1;
position: relative;
width: 100%;
clip-path: polygon(25% 0, 75% 0, 100% 50%, 75% 100%, 25% 100%, 0 50%);
cursor: pointer;
}

.client-area .owl-thumbs .owl-thumb-item .thumb::after, .client-area .owl-thumbs .owl-thumb-item .thumb::before {
content: "";
position: absolute;
width: 100%;
height: 100%;
background: #ffffff;
clip-path: polygon(25% 0, 75% 0, 100% 50%, 75% 100%, 25% 100%, 0 50%);
top: 50%;
left: 50%;
-webkit-transform: translate(-50%, -50%);
-ms-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
cursor: pointer;
}

.client-area .owl-thumbs .owl-thumb-item .thumb::after {
width: calc(100% - 20px);
height: calc(100% - 20px);
background-image: -moz-linear-gradient(41deg, #e96429 30%, #f17b20 67%, #f89216 88%);
background-image: -webkit-linear-gradient(41deg, #e96429 30%, #f17b20 67%, #f89216 88%);
}

.client-area .owl-thumbs .owl-thumb-item:nth-child(1), .client-area .owl-thumbs .owl-thumb-item:nth-child(2), .client-area .owl-thumbs .owl-thumb-item:nth-child(3), .client-area .owl-thumbs .owl-thumb-item:nth-child(4), .client-area .owl-thumbs .owl-thumb-item:nth-child(5), .client-area .owl-thumbs .owl-thumb-item:nth-child(7), .client-area .owl-thumbs .owl-thumb-item:nth-child(6) {
display: block;
}

.client-area .owl-thumbs .owl-thumb-item:nth-child(1) {
right: 10%;
top: 10%;
height: 190px;
width: 220px;
}

@media (min-width: 768px) and (max-width: 991px) {
.client-area .owl-thumbs .owl-thumb-item:nth-child(1) {
right: -4%;
}
}

@media (min-width: 576px) and (max-width: 767px) {
.client-area .owl-thumbs .owl-thumb-item:nth-child(1) {
right: -10%;
width: 180px;
}
}

@media screen and (min-width: 992px) and (max-width: 1365px) {
.client-area .owl-thumbs .owl-thumb-item:nth-child(1) {
width: 130px;
right: 15px;
}
}

@media (min-width: 1366px) and (max-width: 1849px) {
.client-area .owl-thumbs .owl-thumb-item:nth-child(1) {
width: 180px;
right: 30px;
}
}

.client-area .owl-thumbs .owl-thumb-item:nth-child(7) {
left: 10%;
top: 10%;
height: 190px;
width: 220px;
}

.client-area .owl-thumbs .owl-thumb-item:nth-child(7) .thumb::after {
background-image: -moz-linear-gradient(41deg, #2e19cc 0%, #5f13dc 40%, #900cec 78%);
background-image: -webkit-linear-gradient(41deg, #2e19cc 0%, #5f13dc 40%, #900cec 78%);
}

@media (min-width: 768px) and (max-width: 991px) {
.client-area .owl-thumbs .owl-thumb-item:nth-child(7) {
left: -4%;
}
}

@media (min-width: 576px) and (max-width: 767px) {
.client-area .owl-thumbs .owl-thumb-item:nth-child(7) {
left: -10%;
width: 180px;
}
}

@media screen and (min-width: 992px) and (max-width: 1365px) {
.client-area .owl-thumbs .owl-thumb-item:nth-child(7) {
width: 130px;
left: 15px;
}
}

@media (min-width: 1366px) and (max-width: 1849px) {
.client-area .owl-thumbs .owl-thumb-item:nth-child(7) {
width: 180px;
left: 30px;
}
}

.client-area .owl-thumbs .owl-thumb-item:nth-child(2) {
left: 50%;
top: 50%;
height: 354px;
width: 405px;
-webkit-transform: translate(-50%, -50%);
-ms-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
}

.client-area .owl-thumbs .owl-thumb-item:nth-child(2) .thumb {
padding: 30px;
}

.client-area .owl-thumbs .owl-thumb-item:nth-child(2) .thumb::after {
width: calc(100% - 30px);
height: calc(100% - 30px);
}

@media screen and (min-width: 992px) and (max-width: 1365px) {
.client-area .owl-thumbs .owl-thumb-item:nth-child(2) {
width: 300px;
height: 270px;
}
}

.client-area .owl-thumbs .owl-thumb-item:nth-child(3) {
bottom: 0;
left: 50%;
-webkit-transform: translateX(-50%);
-ms-transform: translateX(-50%);
transform: translateX(-50%);
}

.client-area .owl-thumbs .owl-thumb-item:nth-child(3) .thumb {
padding: 16px;
}

.client-area .owl-thumbs .owl-thumb-item:nth-child(3) .thumb::before {
width: calc(100% - 7px);
height: calc(100% - 7px);
}

.client-area .owl-thumbs .owl-thumb-item:nth-child(4) {
top: 0;
left: 50%;
-webkit-transform: translateX(-50%);
-ms-transform: translateX(-50%);
transform: translateX(-50%);
}

.client-area .owl-thumbs .owl-thumb-item:nth-child(4) .thumb {
padding: 16px;
}

.client-area .owl-thumbs .owl-thumb-item:nth-child(4) .thumb::before {
width: calc(100% - 7px);
height: calc(100% - 7px);
}

.client-area .owl-thumbs .owl-thumb-item:nth-child(5) {
bottom: 18%;
left: 2%;
-webkit-transform: translateX(50%);
-ms-transform: translateX(50%);
transform: translateX(50%);
height: 168px;
width: 189px;
}

@media (min-width: 768px) and (max-width: 991px) {
.client-area .owl-thumbs .owl-thumb-item:nth-child(5) {
left: -16%;
}
}

@media (min-width: 576px) and (max-width: 767px) {
.client-area .owl-thumbs .owl-thumb-item:nth-child(5) {
width: 140px;
bottom: 10%;
left: -20%;
}
}

@media screen and (min-width: 992px) and (max-width: 1365px) {
.client-area .owl-thumbs .owl-thumb-item:nth-child(5) {
width: 120px;
left: -43px;
bottom: 10px;
}
}

@media (min-width: 1366px) and (max-width: 1849px) {
.client-area .owl-thumbs .owl-thumb-item:nth-child(5) {
bottom: 70px;
left: 38px;
width: 150px;
-webkit-transform: scale(1);
-ms-transform: scale(1);
transform: scale(1);
}
}

.client-area .owl-thumbs .owl-thumb-item:nth-child(6) {
bottom: 18%;
right: 2%;
-webkit-transform: translateX(-50%);
-ms-transform: translateX(-50%);
transform: translateX(-50%);
height: 168px;
width: 189px;
}

@media (min-width: 768px) and (max-width: 991px) {
.client-area .owl-thumbs .owl-thumb-item:nth-child(6) {
right: -16%;
}
}

@media (min-width: 576px) and (max-width: 767px) {
.client-area .owl-thumbs .owl-thumb-item:nth-child(6) {
width: 140px;
bottom: 10%;
right: -20%;
}
}

@media screen and (min-width: 992px) and (max-width: 1365px) {
.client-area .owl-thumbs .owl-thumb-item:nth-child(6) {
width: 120px;
right: -43px;
bottom: 10px;
}
}

@media (min-width: 1366px) and (max-width: 1849px) {
.client-area .owl-thumbs .owl-thumb-item:nth-child(6) {
bottom: 70px;
right: 38px;
width: 150px;
-webkit-transform: scale(1);
-ms-transform: scale(1);
transform: scale(1);
}
}

.client-area .owl-thumbs .owl-thumb-item:nth-child(4) .thumb::after, .client-area .owl-thumbs .owl-thumb-item:nth-child(6) .thumb::after {
background-image: -moz-linear-gradient(41deg, #2e19cc 0%, #5f13dc 40%, #900cec 78%);
background-image: -webkit-linear-gradient(41deg, #2e19cc 0%, #5f13dc 40%, #900cec 78%);
}

.client-area .owl-thumbs .owl-thumb-item:nth-child(3) .thumb::after, .client-area .owl-thumbs .owl-thumb-item:nth-child(2) .thumb::after {
background-image: -moz-linear-gradient(41deg, #1893f0 30%, #0dc7ea 67%, #01fae3 88%);
background-image: -webkit-linear-gradient(41deg, #1893f0 30%, #0dc7ea 67%, #01fae3 88%);
}

.investor-item {
margin-bottom: 30px;
}

.investor-item .investor-thumb {
position: relative;
}

.investor-item .investor-thumb::after {
background: #860de9;
opacity: 0;
visibility: hidden;
top: 0;
bottom: 0;
right: 0;
left: 0;
-webkit-transition: all ease 0.3s;
-moz-transition: all ease 0.3s;
transition: all ease 0.3s;
}

.investor-item .investor-thumb a {
display: block;
text-align: center;
color: #777777;
font-weight: 500;
visibility: hidden;
opacity: 0;
z-index: 1;
font-size: 50px;
}

.investor-item .investor-thumb a i {
display: block;
width: 50px;
height: 50px;
line-height: 50px;
color: #ffffff;
}

.investor-item .investor-thumb img {
width: 100%;
}

.investor-item:hover .investor-thumb::after {
opacity: 0.402;
visibility: visible;
}

.investor-item:hover .investor-thumb a {
opacity: 1;
visibility: visible;
}

.investor-item:hover .title a {
color: #860de9;
}

.investor-item .investor-content {
background: #ffffff;
width: calc(100% - 40px);
margin-top: -100px;
padding: 30px 30px 21px 30px;
margin-left: auto;
-webkit-border-radius: 8px;
-moz-border-radius: 8px;
border-radius: 8px;
box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
z-index: 1;
position: relative;
}

.investor-item .investor-content .title {
font-size: 22px;
}
.investor-item .investor-content .title a {
color: #111111;
}
.investor-item .investor-content .info {
display: block;
margin-bottom: 10px;
}

.investor-item .investor-content .total {
margin-bottom: -5px;
}

.investor-item .investor-content .amount {
color: #860de9;
}
@media screen and (min-width: 320px) and (max-width: 575px) {
.transaction .transaction-area .nav-tabs .nav-item:first-child .nav-link{
border-radius: 6px 0 0 6px !important;
}
}






.section-feature-item {
text-align: center;
box-shadow: 0 0 20px rgba(0, 0, 0, .1);
padding: 40px 25px;
margin-bottom: 30px;
-webkit-transition: all ease 0.3s;
-moz-transition: all ease 0.3s;
transition: all ease 0.3s;
}

.section-feature-item .feature-thumb {
height: 40px;
font-size: 40px;
margin-bottom: 25px;
color: #ff4600;
line-height: 1;
}
.section-feature-item .feature-thumb img {
max-height: 100%;
}

.section-feature-item .feature-content .title {
margin-bottom: 25px;
text-transform: capitalize;
-webkit-transition: all ease 0.3s;
-moz-transition: all ease 0.3s;
transition: all ease 0.3s;
}

.section-feature-item .feature-content p {
-webkit-transition: all ease 0.3s;
-moz-transition: all ease 0.3s;
transition: all ease 0.3s;
}

.section-feature-item.active, .section-feature-item:hover {
-webkit-transform: translateY(-5px);
-ms-transform: translateY(-5px);
transform: translateY(-5px);
}


.section-feature-item.active .feature-content .title, .section-feature-item:hover .feature-content .title {
color: #3ed03a;
}
.body-page .section-feature-item {
background: #1a2030;
}

.btn.btn-default.website-color.mr-1 {
	font-size: 16px;
}


.feature-item .subtitle::before {
background:<?php echo  $color ?> ;
}

.profit-thumb  i {
font-size: 30px;
color:<?php echo  $color ?> ;
}

.post-item:hover .post-content .title a {
color: <?php echo  $color ?>;
}

.section-feature-item .feature-thumb {
color: <?php echo  $color ?>;
}

.section-feature-item.active .feature-content .title, .section-feature-item:hover .feature-content .title {
color: <?php echo  $color ?>;
}

.blog-article-info *{
color: #fff !important;
}

.inner-banner-area {
    border-bottom: 2px solid <?php echo  $color ?>;
    margin-bottom: 40px;
}

.dark-bg{
background: #1a2030;
color: #fff;
}

.privacy-area{
	padding-top: 55px;
    padding-bottom: 90px;
}
.accordion .card {
	margin-bottom: 20px;
}
.accordion .card-header {
	padding: 0;
}
.accordion .card:last-child {
	margin-bottom: 0;
}

.pagination {
	margin: -3px;
	flex-wrap:wrap;
	justify-content: center;
}
.pagination li {
	padding: 3px;
	background: transparent;
}
.pagination li a, .pagination li span {
	width: 40px;
	height: 40px;
	line-height: 40px;
	text-align: center;
	background: #fff;
	color: #000;
	border: none;
	padding: 0;
}
.pagination li a:hover, .pagination li span:hover {
	background: rgba(255, 255, 255, .8);
	color: <?php echo $color ?>;	
}
.pagination li.disabled span, .pagination li.disabled a {
	background: rgba(255, 255, 255, .8);
}
.pagination li.active span, .pagination li.active .page-link {
	background: <?php echo $color ?>;
}
@media screen and (max-width:991px) {
	.mb_max_lg_50 {
	margin-bottom: 50px;
}
}

.history_table {
width: 100%;
	background: rgb(26 32 48);
color: #ddd;
font-size:14px;
text-align: center;
}
.history_table tbody tr {
border-bottom: 1px solid rgba(255, 255, 255, .2);
}
.history_table tbody tr:last-child {
	border: none !important;
}
.history_table thead tr {
	color: #fff;
	background: <?php echo $color ?>;
}
.history_table .btn {
padding-left: 20px;
padding-right: 20px;
}
.history_table tr td, 
.history_table tr th {
	padding: 10px 15px;
}
@media screen and (max-width:991px) {
	.history_table thead {
	display: none;
	}
	.history_table tr td {
		display: flex;
		justify-content: space-between;
	}
	.history_table tr td::before {
		content: attr(data-label);
	}
}@media screen and (max-width:767px) {
	.p-max-md-0 {
	padding: 0;
	box-shadow: none;
}
}
input[type="file"].form-control {
	height: unset !important;
	padding: 7px;
}
.support-view .dashboard-inner-content .card-body, .support-view .dashboard-inner-content .card, .support-view .dashboard-inner-content form  {
	background: transparent;
}
.card {
	width: 100%;
}