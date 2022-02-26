var mytab = document.querySelectorAll('[data-tab-target]')
var tabContents = document.querySelectorAll('[data-tab-content]')

mytab.forEach(tab => {
  tab.addEventListener('click', () => {
    var target = document.querySelector(tab.dataset.tabTarget)
    tabContents.forEach(tabContent => {
      tabContent.classList.remove('active')
    })
    mytab.forEach(tab => {
      tab.classList.remove('active')
    })
    tab.classList.add('active')
    target.classList.add('active')
  })
})
function openForm(){
  document.getElementById("myForm").style.display = "block";

}
function closeForm(){
  document.getElementById("myForm").style.display = "none";
}