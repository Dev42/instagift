<?php
error_reporting(E_ALL);

include 'config/config.php';
include_once 'inc/header.php';

$access_token_parameters = array(
        'client_id'                =>     $clientId,
        'client_secret'                =>     $secretId,
        'grant_type'                =>     'authorization_code',
        'redirect_uri'                =>     $redirectResponse,
        'code'                        =>     $_GET['code']
);

session_start();

// Instantiate the API handler object
$instagram = new Instagram($access_token_parameters);

$accessToken = $instagram->getAccessToken();
$_SESSION['InstagramAccessToken'] = $accessToken;

$instagram->setAccessToken($_SESSION['InstagramAccessToken']);
$userinfo = $instagram->getUser($_SESSION['InstagramAccessToken']);

// After getting the response, let's iterate the payload
$ures = json_decode($userinfo, true);

$mostRecent = $instagram->getUserRecent($ures['data']['id']);
$mediasUser = json_decode($mostRecent, true);

echo "<pre>";
print_r($ures['data']);
echo "</pre>";

?>



<div id="bd-geral">
    <div class="myuser">
        <div class="myuser-photo">
            <img src="<?php echo $ures['data']['profile_picture'] ?>" />
        </div>
        <strong><?php echo $ures['data']['username'] ?>(<?php echo $ures['data']['full_name'] ?>)</strong>
        <div class="myuser-info">
            <div class="myuser-info-line">
                <div class="myuser-info-line-ico">
                    <img src="images/icons/total-photos.png" alt="Total de imagens" />
                </div>
                <div class="myuser-info-line-text">
                    Número de fotos: <b><?php echo $ures['data']['counts']['media'] ?></b>
                </div>
                <div class="lineClear"></div>
            </div>
            <div class="myuser-info-line">
                <div class="myuser-info-line-ico">
                    <img src="images/icons/following.png" alt="Segiundo" />
                </div>
                <div class="myuser-info-line-text">
                    Seguindo: <b><?php echo $ures['data']['counts']['follows'] ?></b>
                </div>
                <div class="lineClear"></div>
            </div>
            <div class="myuser-info-line">
                <div class="myuser-info-line-ico">
                    <img src="images/icons/followme.png" alt="Total de seguidores" />
                </div>
                <div class="myuser-info-line-text">
                    Seguidores: <b><?php echo $ures['data']['counts']['followed_by'] ?></b>
                </div>
                <div class="lineClear"></div>
            </div>
            <div class="myuser-info-bio">
                <ul>
                    <li>
                        <span>Titulo</span>
                        <span>Informação</span>
                    </li>
                    <li>
                        <span>Titulo</span>
                        <span>Informação</span>
                    </li>
                </ul>
                <div class="lineClear"></div>
            </div>
        </div>
    </div>
    <div class="userPhotos">
<?php
/*echo "<pre>";
print_r($mediasUser);
echo "</pre>";*/
$fotosGeral = $mediasUser['data'];

foreach($fotosGeral as $k => $v){
    /*echo "<pre>";
    var_dump($v['link']);
    var_dump($v['images']);
    echo "</pre>";*/
    echo "<div class='instaBlockGallery'>";
    echo "<div class='instaBlockPhoto'>";
    echo "<a href='".$v['link']."'><img src='".$v['images']['thumbnail']['url']."' /></a>";
    echo "<div class='instaBlockPhotoinfo'>";
    echo "<span style='font-weight: 700;'><div> <div style='float: left;'><img src='images/icons/like.png' alt='Likes' /></div><div style='float: left; margin-top: 15px; margin-left: 15px;'> (".$v['likes']['count'].") </div></div><div class='lineClear'></div><div><div style='float: left;'><img src='images/icons/comment.png' alt='Comentários' /></div><div style='float: left; margin-top: 15px; margin-left: 15px;'> (".$v['comments']['count'].")</div></div> <div class='lineClear'></div></span>";
    echo "<br />";
    echo "<br />";
    echo $v['caption']['text'];
    echo "<div class='lineClear'></div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    if ($k%2 == 0 && $k !== 0){
        echo "<div class='lineClear'></div>";
    }
}
?>
        <div class="lineClear"></div>
    </div>
    <div class="lineClear"></div>
</div>
<?php 
include_once 'inc/footer.php';
?>