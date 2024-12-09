function handleDelete(id) {
    var confirmation = confirm('Bạn có muốn xóa bông hoa này không?');
    
    if (confirmation) {
        window.location.href = 'http://localhost:3000/Bai1_end/controller/deleteFlower.php?sid=' + id;
    } else {
        return false;
    }
}

function handleEdit(id){
    return window.location.href = 'http://localhost:3000/Bai1_end/controller/editFlower.php?sid=' + id;
}