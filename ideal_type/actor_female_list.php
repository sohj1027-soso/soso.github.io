<?php
header('Content-Type: application/json; charset=utf-8');

// 이미지 폴더 경로 (actor_female_list.php 기준 상대경로)
$dir = __DIR__ . "/actor_female_image/";

// 폴더가 존재하는지 확인
if (!is_dir($dir)) {
    echo json_encode(["error" => "폴더를 찾을 수 없습니다."]);
    exit;
}

// 이미지 파일 목록 불러오기
$files = array_values(array_filter(scandir($dir), function($file) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    return in_array($ext, ["jpg", "jpeg", "png", "gif", "webp"]);
}));

echo json_encode($files, JSON_UNESCAPED_UNICODE);
