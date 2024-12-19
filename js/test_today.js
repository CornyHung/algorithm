// Function to calculate working hours for an employee in a day
function calculateWorkHours(checkInOutData) {
    const shifts = [
        { start: new Date(0, 0, 0, 8, 0), end: new Date(0, 0, 0, 12, 0) },
        { start: new Date(0, 0, 0, 13, 30), end: new Date(0, 0, 0, 17, 30) },
        { start: new Date(0, 0, 0, 18, 0), end: new Date(0, 0, 0, 22, 0) },
    ];

    let totalWorkHours = 0;
    const anomalies = [];

    // Sort the check-in/out data by time
    checkInOutData.sort((a, b) => parseTime(a.checked_at) - parseTime(b.checked_at));

    // Track used check-in/out records
    const usedRecords = new Set();

    shifts.forEach(shift => {
        let shiftWorkHours = 0;

        for (let i = 0; i < checkInOutData.length; i++) {
            if (usedRecords.has(i)) continue;

            const checkIn = parseTime(checkInOutData[i].checked_at);
            console.log(checkIn, shift.start);
            
            if (checkIn < shift.end) {
                for (let j = i + 1; j < checkInOutData.length; j++) {
                    if (usedRecords.has(j)) continue;

                    const checkOut = parseTime(checkInOutData[j].checked_at);

                    if (checkOut > checkIn) {
                        // Calculate work hours for this valid check-in/out pair
                        const hoursWorked = (checkOut - checkIn) / (1000 * 60 * 60); // Convert ms to hours
                        shiftWorkHours += hoursWorked;
                        usedRecords.add(i);
                        usedRecords.add(j);
                        break;
                    }
                }
            }
        }

        totalWorkHours += Math.min(shiftWorkHours, 4); // Max 4 hours per shift
    });
    console.log(usedRecords);
    
    // Identify anomalies
    for (let i = 0; i < checkInOutData.length; i++) {
        if (!usedRecords.has(i)) {
            anomalies.push({ type: 'Unmatched Record', record: checkInOutData[i] });
        }
    }

    return { totalWorkHours, anomalies };
}

// Helper function to parse time string to Date
function parseTime(timeString) {
    const [hours, minutes, seconds] = timeString.split(':').map(Number);
    return new Date(0, 0, 0, hours, minutes, seconds);
}

// Example usage
const checkInOutData = [
    { id: 1, checked_at: '07:30:00' },
    { id: 1, checked_at: '09:30:00' },
    { id: 1, checked_at: '13:10:00' },
    { id: 1, checked_at: '13:20:00' },
    { id: 1, checked_at: '17:40:00' },
    { id: 1, checked_at: '17:50:00' },
    { id: 1, checked_at: '22:20:00' },
];

const { totalWorkHours, anomalies } = calculateWorkHours(checkInOutData);
console.log(`Total working hours: ${totalWorkHours}`);
console.log('Anomalies:', anomalies);
