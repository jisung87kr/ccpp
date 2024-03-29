<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 300;
$thumb_height = 300;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>

<div class="pic_lt">
    <h2 class="lat_title"><a href="<?php echo get_pretty_url($bo_table); ?>"><?php echo $bo_subject ?></a></h2>
    <ul>
    <?php
    for ($i=0; $i<$list_count; $i++) {
//    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);
//
//    if($thumb['src']) {
//        $img = $thumb['src'];
//    } else {
//        $img = G5_IMG_URL.'/no_img.png';
//        $thumb['alt'] = '이미지가 없습니다.';
//    }
    $img_content = '<img src="'.$list[$i]['wr_5'].'" alt="'.$list[$i]['subject'].'" >';
    ?>
        <li class="galley_li">
            <div class="lt_img itemLinkBox">
                <?php echo $img_content; ?>
                <div class="itemLinkBox-inner">
                    <a href="<?php echo $list[$i]['href'] ?>" class="itemLinkBox-item">상품보기</a>
                    <a href="<?php echo $list[$i]['wr_link1'] ?>" class="itemLinkBox-item">바로구매</a>
                </div>
            </div>
            <?php
            if ($list[$i]['icon_secret']) echo "<i class=\"fa fa-lock\" aria-hidden=\"true\"></i><span class=\"sound_only\">비밀글</span> ";

            echo "<a href=\"".$list[$i]['href']."\"> ";
            if ($list[$i]['is_notice'])
                echo "<strong>".$list[$i]['subject']."</strong>";
            else
                echo $list[$i]['subject'];
            echo "</a>";
			
			if ($list[$i]['icon_new']) echo "<span class=\"new_icon\">N<span class=\"sound_only\">새글</span></span>";
            if ($list[$i]['icon_hot']) echo "<span class=\"hot_icon\">H<span class=\"sound_only\">인기글</span></span>";

            // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
            // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

			// echo $list[$i]['icon_reply']." ";
			// if ($list[$i]['icon_file']) echo " <i class=\"fa fa-download\" aria-hidden=\"true\"></i>" ;
            // if ($list[$i]['icon_link']) echo " <i class=\"fa fa-link\" aria-hidden=\"true\"></i>" ;

            if ($list[$i]['comment_cnt'])  echo "
            <span class=\"lt_cmt\">".$list[$i]['wr_comment']."</span>";

            ?>

            <div class="lt_info">
                <span class="lt_price"><strong><?php echo number_format($list[$i]['wr_2']) ?></strong>원</span>
				<!-- <span class="lt_nick"><?php echo $list[$i]['name'] ?></span> -->
                <!-- <span class="lt_date"><?php echo $list[$i]['datetime2'] ?></span> -->
                <?php if($list[$i]['wr_3'] == 1){ ?>
                    <span class="is_roket">로켓배송</span>
                <?php } ?>
                <?php if($list[$i]['wr_4'] == 1){ ?>
                    <span class="is_freeshoping">무료배송</span>
                <?php } ?>
            </div>
        </li>
    <?php }  ?>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>
    <li class="empty_li">게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
    <a href="<?php echo get_pretty_url($bo_table); ?>" class="lt_more"><span class="sound_only"><?php echo $bo_subject ?></span>더보기</a>
    <div class="text-center">
        <a href="<?php echo get_pretty_url($bo_table); ?>" class="btn-more"><span class="sound_only"><?php echo $bo_subject ?></span>더보기</a>
    </div>


</div>
