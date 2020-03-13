

class setLanguage {
  
  constructor(){

  }

  addListener(){
    console.log('test');
    const form = document.getElementById('layouts-nav-form')
    const select = document.getElementById('layouts-nav-select')
    console.log(select)
    select.addEventListener('change', henk(), false);
  }
}

function henk(){
  this.form.submit();
  console.log('tkip')
}

export default setLanguage;