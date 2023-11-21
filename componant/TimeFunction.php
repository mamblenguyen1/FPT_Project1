<?
class Time
{
    function timecount($date)
    {
        // Đếm thời gian và hiển thị làm tròn đơn vị gần nhất
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $currentTime = new DateTime();
        $yourDate = new DateTime($date);
        $timeDiff = $currentTime->diff($yourDate);
        if ($timeDiff->y > 0) {
            $result = round($timeDiff->y) . ' năm trước';
        } elseif ($timeDiff->m > 0) {
            $result = round($timeDiff->m) . ' tháng trước';
        } elseif ($timeDiff->d > 0) {
            $result = round($timeDiff->d) . ' ngày trước';
        } elseif ($timeDiff->h > 0) {
            $result = round($timeDiff->h) . ' giờ trước';
        } elseif ($timeDiff->i > 0) {
            $result = round($timeDiff->i) . ' phút trước';
        } else {
            $result = 'Vừa mới xong';
        }
        return $result;
    }

    function timeformatter($date)
    {
        $currentTime = new datetime($date);
        $currentDateTimeFormatted = $currentTime->format('H:i:s d-m-Y');
        return $currentDateTimeFormatted;
    }
}
