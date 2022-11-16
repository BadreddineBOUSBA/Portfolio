var i = 0, j;
var txt = "Upload  images in  any format and process them easily.";
var show_txt1 = false;
function textWriter() {
    var content = document.getElementById("txt-intro");
    if (i < txt.length) {
        content.innerHTML += txt[i];
        i++;
        setTimeout(textWriter, 100);
        j = i;
    } else if (i == txt.length) {
        setTimeout(textWriter, 5000);
        i++;
    }else {
        content.textContent=content.textContent.substring(0, j-1);
        j--;
        setTimeout(textWriter, 100);
        if (j === 0) {
            i = 0;
            show_txt1 ? txt = "Upload  images in  any format and process them easily.":txt = "Crop and reduce image size without losing quality.";
            show_txt1 = !show_txt1;
            
        }
    }
}
textWriter();
const checkPoint = 400;
window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset;
    if (currentScroll > 200) {
        document.querySelector("header").style["height"] = "8vh"
        document.querySelector("header img").style["height"] = "8vh"
         document.querySelector("header img").style["width"]="12vh"
    } else {
        document.querySelector("header").style["height"] = "10vh" 
        document.querySelector("header img").style["height"] = "10vh" 
        document.querySelector("header img").style["width"]="14vh" 
    }
    if (currentScroll <= checkPoint) {
        scale = "scale(1, 1)";
    } else {
        scale = "scale(1.2, 1.15)";
    }
    document.querySelector(".home-intro-text").style.transform = scale;
})