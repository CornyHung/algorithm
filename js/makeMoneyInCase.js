// Cho 1 mang tien [1000, 2000, 5000, 10000, 20000, 50000, 100000, 200000, 500000]
// param = 2600000
// Tinh ra so to tien nhan duoc sao cho nho nhat

function makeMoney (money) {

    const arrMoney = []
    const arr = [1000, 2000, 5000, 10000, 20000, 50000, 100000, 200000, 500000]

    let tempMoney = money

    for (let i = arr.length - 1; i >= 0; i--) {
        if (arr[i] > tempMoney) {
            continue
        } else {
            const times =  Math.floor(tempMoney / arr[i]) 
            tempMoney = tempMoney % arr[i]
            arrMoney.unshift({so_to: times, menh_gia: arr[i]})
        }
        
    }
    
    return arrMoney
}
console.log(makeMoney(2606000))