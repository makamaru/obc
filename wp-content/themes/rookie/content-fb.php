<?php
/**
 * @package Rookie
 */
?>


<?php

date_default_timezone_set('Europe/Paris');

require_once __DIR__ . '/vendor/autoload.php'; // change path as needed

$app_id = FB_API_ID;
$app_secret = FB_API_SECRET;
$token = FB_API_TOKEN;

$fb = new \Facebook\Facebook([
  'app_id' => $app_id,
  'app_secret' => $app_secret,
  'default_graph_version' => 'v2.5',
  'default_access_token' => $token, // optional
]);

  $response = $fb->get('/'.$app_id.'/?fields=picture');
  $picture = $response->getDecodedBody();
  $avatar_url = $picture['picture']['data']['url'];

  $param = '?fields=id,story,from,updated_time,message,created_time,full_picture,attachments,likes.limit(100), reactions.limit(100),shares.limit(100),comments.limit(100)&locale=fr_FR';

  // On récupère les informations personnel
  $response = $fb->get('/'.$app_id.'/posts'.$param);
  $posts = $response->getGraphEdge();
  $json = json_decode($posts, true);
  $posts = array_chunk($json, 3);

  // var_dump($posts[0][1]['reactions']);
?>


<!-- jquery  -->
<?php wp_enqueue_script( 'jquery'); ?>


<?php foreach ($posts[0] as $post): ?>
	<?php // var_dump($post['attachments'][0]['media']['image']) ?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default" style="background-color: #f6f7f9;">
            <div class="panel-body">
               <section class="post-heading" style="margin-bottom: 5px;">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="media-left">
                                <a href="#">
                                    <img src="<?= $avatar_url ?>" class="img-circle img-avatar" />
                                </a>
                            </div>
                            <div class="media-body" style="vertical-align: middle; color: #90949c;">
                                <div>
                                <?php 
                                    $likedName = '<a href="#" class="anchor-username"><b>'.$post['from']['name'].'</b></a>';
                                    if (isset($post['story'])) {
                                        $from = str_replace($post['from']['name'], $likedName, $post['story']);
                                    } else {
                                        $from = $likedName;
                                    }
                                    echo $from;
                                ?>
                                </div>
                                <small> 
                                <?php
                                    $date = new DateTime($post['created_time']['date'], new DateTimeZone($post['created_time']['timezone']));
                                    $date->setTimezone(new DateTimeZone('Europe/Paris'));
                                    echo $date->format('j F, H:i');
                                ?>
                                </small>
                            </div>
                        </div>
                         <div class="col-md-1">
                             <a href="#"><i class="glyphicon glyphicon-chevron-down"></i></a>
                         </div>
                    </div>             
               </section>
               <section class="post-body" style="font-family: 'Segoe UI' !important;">
               		<?php 
               			$resume = null;
               			$message = isset($post['message']) ? $post['message'] : '';
               			if (strlen($message) > 300) {
               				$resume = substr($message, 0, 300);
               			} 
               		?>
                   	<div><p>
                   		<?php 
                   			if ($resume) {
                   				echo $resume . ' . . .';
                   				echo '<br/><a href="#">Afficher la suite</a>';
                   			}else {
                   				echo $message;
                   			}
                   		?>
                   	</p></div>
                   	<?php 
                      $image = null;
                      $image1 = null;
                      $image2 = null;
                      $attachment = $post['attachments'][0];
                      if (isset($attachment['subattachments'])) {
                        $image1 = $attachment['subattachments'][0]['media']['image'];
                        $image2 = $attachment['subattachments'][1]['media']['image'];
                      } else {
                   	    $image = $attachment['media']['image'];
                      }
                   	?>
                   	<div style="max-height: 400px; overflow: hidden; ">
                      <?php if ($image) : ?>
                        <img class="img-responsiv" width="100%" height="100%" src=<?= $image['src'] ?> />
                      <?php endif; ?>
                      <?php if ($image1 && $image2) : ?>
                        <img class="img-responsiv" width="50%" height="100%" style="float:left" src=<?= $image1['src'] ?> />
                        <img class="img-responsiv" width="50%" height="100%" style="float:left" src=<?= $image2['src'] ?> />
                      
                      <?php endif; ?>
                   	</div>
               </section>
            </div>
            <div class="panel-footer">
                <section class="post-footer">
                    <div class="post-footer-option row">
                        <div class="col-xs-4" style="text-align: center">
                            <a href="#"><i class="glyphicon glyphicon-thumbs-up"></i> <?= isset($post['reactions']) ? count($post['reactions']) . ' likes' : '0 like'?></a>
                        </div>
                        <div class="col-xs-4" style="text-align: center">
                            <a href="#"><i class="glyphicon glyphicon-comment"></i> <?= isset($post['comments']) ?  count($post['comments']) . ' comments' : '0 comment' ?></a>
                        </div>
                        <div class="col-xs-4" style="text-align: center">
                            <a href="#"><i class="glyphicon glyphicon-share-alt"></i> <?= isset($post['shares']['count']) ? $post['shares']['count'] . ' shares' : '0 share' ?></a>
                        </div>
                    </div>
                    <?php $comments = isset($post['comments']) ? $post['comments'] : [] ?>
                    <?php if ($comments) : ?>
                        <hr style="margin-top: 10px; margin-bottom: 5px;">
                    <?php endif; ?>
                    <div class="post-footer-comment-wrapper">
                        <?php foreach ($comments as $comment): ?>
                        <?php
                            $response = $fb->get('/'.$comment['from']['id'].'/?fields=picture');
                            $picture = $response->getDecodedBody();
                            $avatar_comment_url = $picture['picture']['data']['url'];
                        ?>
                        <div class="comment" style="padding-top: 10px;">
                            <div class="media">
                              <div class="media-left">
                                <a href="#">
                                  <img class="img-circle img-avatar-comment" src="<?= $avatar_comment_url ?>" >
                                </a>
                              </div>
                              <div class="media-body" style="margin-bottom:5px;">
                                <div style="float: left; margin: 0px 5px 0px 0px;">
                                    <a href="#" class="anchor-username">
                                        <b><?= $comment['from']['name'] ?></b>
                                    </a>
                                </div>
                                <?= $comment['message'] ?>
                                <br style="clear: both;" />
                                <small style="color: #90949c;">
                                <?php
                                    $date = new DateTime($comment['created_time']['date'], new DateTimeZone($comment['created_time']['timezone']));
                                    $date->setTimezone(new DateTimeZone('Europe/Paris'));
                                    echo $date->format('j F, H:i');
                                ?>
                                </small>
                              </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </section>
            </div>
        </div>   
    </div>
</div>
<?php endforeach ?>