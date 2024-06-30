//Tìm 1 mốc trong mảng nên là đầu mảng hoặc cuối mảng : pivot
//  Loop mảng nếu arr[i] > pivot => left arr; else right arr
// Sư dụng đệ quy để quét lại 2 mảng left và right
function quickSort(arr) {
    const count = arr.length
    if (count <= 1) {
        return arr
    }

    const pivot = arr[0]

    const left = []
    const right = []

    for (let i = 1; i < count; i++) {
        if (arr[i] < pivot) {
            left.push(arr[i])
        } else {
            right.push(arr[i])
        }
    }

    return  [...quickSort(left), pivot, ...quickSort(right)]


}

console.log(quickSort([3,4,5,2,3,6,1,5,6,7,2,2,2,2,5,8,9,6,9,7,7]));