// Step 1: loop arr

function bubbleSort(params) {
  const count = params.length;
  for (let i = 0; i <= count; i++) {
    //  j < count - i - 1: vì chỉ cần duyệt các vị trí bên trên do các số to đã dược đảo xuống dưới cùng
    for (let j = 0; j < count - i - 1; j++) {
      //  Check nếu vị trí hiện tại > vị trí tiếp theo tiến hành hoán đổi vị trí cho nhau
      //  Mục đích cho những số lớn xuống dưới cùng
      if (params[j] > params[j + 1]) {
        [params[j], params[j + 1]] = [params[j + 1], params[j]];
      }
    }
  }
  return params;
}

const params = [2, 3, 4, 6, 5, 1, 7, 5, 6, 9];

console.log(bubbleSort(params));
