<?php
function calculateShiftDurations($shiftTimes, $attendances) {
    $shiftDurations = [
        'ca1' => 0,
        'ca2' => 0,
        'ca3' => 0,
    ];

    $shiftAttendances = [
        'ca1' => ['checkin' => null, 'checkout' => null],
        'ca2' => ['checkin' => null, 'checkout' => null],
        'ca3' => ['checkin' => null, 'checkout' => null],
    ];

    usort($attendances, function ($a, $b) {
        return strtotime($a['time_attendances']) - strtotime($b['time_attendances']);
    });

    foreach ($attendances as $attendance) {
        $attendanceTime = strtotime($attendance['time_attendances']);

        foreach ($shiftTimes as $shift => $timeRange) {
            $shiftStart = strtotime($timeRange['start']);
            $shiftEnd = strtotime($timeRange['end']);

            if ($attendanceTime >= $shiftStart && $attendanceTime <= $shiftEnd) {
                if (!$shiftAttendances[$shift]['checkin']) {
                    $shiftAttendances[$shift]['checkin'] = $attendanceTime;
                }
                $shiftAttendances[$shift]['checkout'] = $attendanceTime;
            }
        }
    }

    foreach ($shiftAttendances as $shift => $times) {
        if ($times['checkin'] && $times['checkout']) {
            $duration = ($times['checkout'] - $times['checkin']) / 3600;
            $shiftDurations[$shift] = min($duration, 4);
        }
    }

    return $shiftDurations;
}

$shiftTimes = [
    'ca1' => ['start' => '08:00:00', 'end' => '12:00:00'],
    'ca2' => ['start' => '13:30:00', 'end' => '17:30:00'],
    'ca3' => ['start' => '18:00:00', 'end' => '22:00:00'],
];

$attendances = [
    ['id' => 1, 'checked_at' => '07:30:00'],
    ['id' => 1, 'checked_at' => '12:30:00'],
    ['id' => 1, 'checked_at' => '13:20:00'],
    ['id' => 1, 'checked_at' => '17:40:00'],
    ['id' => 1, 'checked_at' => '17:50:00'],
    ['id' => 1, 'checked_at' => '22:20:00'],
];

$shiftDurations = calculateShiftDurations($shiftTimes, $attendances);

print_r($shiftDurations);
?>
