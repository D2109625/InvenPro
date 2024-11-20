function clearResults(id) {
  if (document.querySelector(`#${id}-results`)) {
    document.querySelector(`#${id}-results`).remove();
  }
}

function handleKeydown(id, e, callback) {
  switch (e.key) {
    case "Escape":
      e.preventDefault();
      clearResults(id);
      break;
    case "ArrowDown":
      e.preventDefault();
      handleArrowDown(id);
      break;
    case "ArrowUp":
      e.preventDefault();
      handleArrowUp(id);
      break;
    case "Enter":
      e.preventDefault();
      handleEnter(id, callback);
      break;
  }
}

function handleArrowDown(id) {
  const results = document.querySelector(`#${id}-results`);
  if (!results) {
    return;
  }

  const active = document.querySelector(`#${id}-results .active`);
  if (!active) {
    results.firstChild.classList.add("active");
  } else if (active?.nextElementSibling) {
    active.classList.remove("active");
    active.nextElementSibling.classList.add("active");
  }
}

function handleArrowUp(id) {
  const results = document.querySelector(`#${id}-results`);
  if (!results) {
    return;
  }

  const active = document.querySelector(`#${id}-results .active`);
  if (!active) {
    results.lastChild.classList.add("active");
  } else if (active?.previousElementSibling) {
    active.classList.remove("active");
    active.previousElementSibling.classList.add("active");
  }
}

function handleEnter(id, callback) {
  const active = document.querySelector(`#${id}-results .active`);
  if (active) {
    document.querySelector(`#${id} input`).value = active.innerText;
    clearResults(id);
    callback(active);
  }
}

async function autocomplete(id, queryAPI, callback) {
  const searchInput = document.querySelector(`#${id} input`);
  const query = searchInput.value;

  if (!query) {
    clearResults(id);
    return;
  }

  const response = await fetch(`${queryAPI}?q=${query}`);
  const data = await response.json();

  if (!data.success || data.data.query !== searchInput.value) {
    return;
  }

  const results = document.createElement("div");
  results.id = `${id}-results`;
  clearResults(id);
  results.classList.add("autocomplete-results");
  document.querySelector(`#${id}`).appendChild(results);

  for (const resultItem of data.data.results) {
    const result = document.createElement("div");
    result.dataset.id = resultItem.id;
    result.innerText = resultItem.name;
    result.addEventListener("click", () => {
      searchInput.value = resultItem.name;
      clearResults(id);
      callback(result);
    });
    results.appendChild(result);
  }

  document.getElementById(id).onkeydown = (e) => handleKeydown(id, e, callback);
}