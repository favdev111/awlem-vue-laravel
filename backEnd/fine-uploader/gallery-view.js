var galleryUploader=new qq.FineUploader({element:document.getElementById("fine-uploader-gallery"),template:'qq-template-gallery',request:{endpoint:'/server/success.html',method:'GET'},thumbnails:{placeholders:{waitingPath:'/source/placeholders/waiting-generic.png',notAvailablePath:'/source/placeholders/not_available-generic.png'}},validation:{allowedExtensions:['jpeg','jpg','gif','png']},debug:true});