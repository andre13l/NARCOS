const select = (selector) => document.querySelector(selector);
const selectAll = (selector) => document.querySelectorAll(selector);

const toggleElem = (elem) => {
  elem.classList.toggle('d-none');
}

/**
 * @brief Show confirm text before certain action
 * @param {*} elem 
 * @param {*} deleteHandler 
 */
const confirmAction = (elem, deleteHandler) => {
  const warn = document.createElement('span');
  warn.classList.add('px-3');
  warn.innerText = 'Confirm?';

  const button = select(elem);
  button.insertAdjacentElement('beforebegin', warn);
  button.onclick = deleteHandler;
}

function addEventListeners() {

  const articleFilter = select('#filterSection');
  if (articleFilter)
    articleFilter.addEventListener('change', filterArticles);

  const submitButtons = selectAll('.submit');
  [].forEach.call(submitButtons, function(checker) {
    checker.addEventListener('click', function() {
      this.parentNode.submit();
    });
  });
}

function encodeForAjax(data) {
  if (data == null) return null;
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}

function sendAjaxRequest(method, url, data, handler) {
  const request = new XMLHttpRequest();

  request.open(method, url, true);
  request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
  request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  request.addEventListener('load', handler);
  request.send(encodeForAjax(data));
}

const createErrorMessage = (errors) => {
  const msg = document.createElement('div');
  msg.classList.add('error');
  msg.classList.add('text-center');

  for (let error of Object.values(errors)) {
    const errorMsg = document.createElement('span');
    errorMsg.classList.add('text-danger');
    errorMsg.innerHTML = error;
    msg.appendChild(errorMsg);
  }

  return msg;
}

const checkPass = (id) => {
  const matchingMsg = select('#matchingPass');
  const confirmId = `${id}-confirm`;

  if (select(id).value == select(confirmId).value) {
      matchingMsg.style.color = 'green';
      matchingMsg.innerHTML = 'matching';
  } else {
      matchingMsg.style.color = 'red';
      matchingMsg.innerHTML = 'not matching'
  }
}

setSearchType = (item) => {
  select('#searchDropdownButton').innerHTML = item.innerText;
  select("#searchForm input[name='type']").value = item.innerText.toLowerCase();
}

function filterArticles() {
  const url = getFilterUrl();
  sendAjaxRequest('get', url, null, replaceArticles);
}

addEventListeners();

function goBack() {
  history.back();
}

// Enable tooltips
const tooltipTriggerList = [].slice.call(selectAll('[data-bs-toggle="tooltip"]'))
const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl, {
    delay: { show: 500, hide: 100 },
  });
});

// Enable Text Editor
tinymce.init({
  selector: '#body',
  plugins: 'a11ychecker autosave advcode casechange export linkchecker autolink lists media mediaembed powerpaste table advtable tinymcespellchecker',
  toolbar: 'a11ycheck advcode numlist bullist casechange code export table',
  toolbar_mode: 'floating',
  skin: "oxide-dark",
  content_css: "dark",
  mobile: {
    theme: 'mobile',
    plugins: 'autosave lists autolink',
  }
});

// Enable toasts
const toastElList = [].slice.call(selectAll('.toast'))
const toastList = toastElList.map(function (toastEl) {
  return new bootstrap.Toast(toastEl, {});
});
