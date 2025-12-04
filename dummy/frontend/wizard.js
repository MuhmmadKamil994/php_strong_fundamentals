document.addEventListener("DOMContentLoaded", function () {
  const stepIds = [
    "step-personal-1",
    "step-personal-2",
    "step-address-phone",
    "step-passport",
    "step-travel",
    "step-travel-companions",
    "step-previous-us-travel",
    "step-us-contact",
    "step-relatives",
    "step-work-education-present",
    "step-work-education-previous",
    "step-work-education-additional",
    "step-security-part1",
    "step-security-part2",
    "step-security-part3",
    "step-security-part4",
    "step-security-part5",
    "step-photo",
  ];

  let currentStep = 0;

  const prevBtn = document.getElementById("prev-btn");
  const nextBtn = document.getElementById("next-btn");

  if (!prevBtn || !nextBtn) {
    console.error("Navigation buttons not found in DOM.");
    return;
  }
  function showStep(index) {
    stepIds.forEach((id, i) => {
      const el = document.getElementById(id);
      if (el) {
        el.classList.toggle("hidden", i !== index);
      }
    });

    // Back button visibility
    prevBtn.classList.toggle("hidden", index === 0);

    // Update button labels dynamically
    if (index === stepIds.length - 1) {
      nextBtn.innerHTML = `Finish <i class="bi bi-check-lg"></i>`;
      nextBtn.type = "submit"; // allow form submit
    } else {
      const nextLabel = stepIds[index + 1]?.replace("step-", "").replace(/-/g, " ");
      nextBtn.innerHTML = `Next: ${capitalizeWords(nextLabel)} <i class="bi bi-arrow-right"></i>`;
      nextBtn.type = "button"; // prevent accidental form submit
    } 

    if (index > 0) {
      const prevLabel = stepIds[index - 1]?.replace("step-", "").replace(/-/g, " ");
      prevBtn.innerHTML = `<i class="bi bi-arrow-left"></i> Back: ${capitalizeWords(prevLabel)}`;
    }
  }

  function capitalizeWords(str) {
    return str
      ? str
          .split(" ")
          .map((w) => w.charAt(0).toUpperCase() + w.slice(1))
          .join(" ")
      : "";
  }

  // Next button logic
  nextBtn.addEventListener("click", function (e) {
    if (currentStep < stepIds.length - 1) {
      e.preventDefault(); // stop form submission
      currentStep++;
      showStep(currentStep);
    }
  });

  // Back button logic
  prevBtn.addEventListener("click", function (e) {
    e.preventDefault();
    if (currentStep > 0) {
      currentStep--;
      showStep(currentStep);
    }
  });
  // personal1 section 
  let US_STATES = []; 

  fetch('U.S-state.json')
    .then(response => response.json())
    .then(states => {
      US_STATES = states;
      document.querySelectorAll('select.us-states').forEach(select => {
        populateStatesSelect(select);
      });
    })
    .catch(err => console.error('Error loading states list:', err));


function populateStatesSelect(select) {
  if (!select) return;
  select.innerHTML = '<option value="">--Select State--</option>';
  US_STATES.forEach(state => {
    const option = document.createElement('option');
    option.value = state.abbreviation;
    option.textContent = state.name;
    select.appendChild(option);
  });
}
function toggleSection(section, show) {
  const el = (typeof section === 'string') ? document.getElementById(section) : section;
  if (!el) return; 
  el.classList.toggle('hidden', !show);
  el.querySelectorAll('input, select, textarea').forEach(control => {
    const tag = control.tagName.toLowerCase();
    const type = control.type;
    if (show) {
      control.disabled = false;
      if (control.dataset.originalRequired === 'true') control.required = true;
    } else {
      if (control.required && !control.dataset.originalRequired) {
        control.dataset.originalRequired = 'true';
      }
      control.required = false;
      control.disabled = true;
      if (type === 'checkbox' || type === 'radio') {
        control.checked = false;
      } else if (type === 'file') {
        control.value = null; 
      } else if (tag === 'select') {
        if (control.multiple) {
          Array.from(control.options).forEach(opt => (opt.selected = false));
        } else {
          control.selectedIndex = 0;
        }
      } else {
        control.value = '';
      }
    }
  });
}
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  tooltipTriggerList.forEach(el => new bootstrap.Tooltip(el));



  function populateCountries(selectId) {
    const select = document.getElementById(selectId);
    if (!select) return;
    fetch("https://restcountries.com/v3.1/all?fields=name")
      .then(res => res.json())
      .then(data => {
        const countries = data.sort((a, b) => a.name.common.localeCompare(b.name.common));
        countries.forEach(c => {
          const option = document.createElement("option");
          option.textContent = c.name.common;
          select.appendChild(option);
        });
      });
  }

  ["birth-country","Employee-country","other-nationality-select","education-country","occupation-country","country-drop","Spouse-birth-country","Spouse-country","stolen-passport-issue-country","passport-issue-country","mailing-country","person-pay","Company-pay", "nationality","personal-country" ].forEach(populateCountries);

  document.querySelectorAll('.state-toggle-block').forEach(block => {
  const input = block.querySelector('.state-input');
  const checkbox = block.querySelector('.state-toggle-checkbox');

  checkbox.addEventListener('change', () => {
    input.disabled = checkbox.checked;
    if (checkbox.checked) {
      input.value = "";
    }
  });
});
function toggleSSNFields() {
  const parts = ["ssn-part1", "ssn-part2", "ssn-part3"].map(id => document.getElementById(id));
  const checkbox = document.getElementById("toggle-checkbox");

  function autoTabSSN() {
    parts.forEach((input, i, arr) => {
      input.addEventListener("input", () => {
        if (input.value.length === input.maxLength && i < arr.length - 1) {
          arr[i + 1].focus();
        }
      });
    });
  }

  function handleCheckboxToggle() {
    checkbox.addEventListener("change", () => {
      parts.forEach(input => {
        input.disabled = checkbox.checked;
        if (checkbox.checked) {
          input.value = ""; 
        }
      });
    });
  }

  autoTabSSN();
  handleCheckboxToggle();
}

toggleSSNFields();



  const otherNamesRadios = document.querySelectorAll('input[name="other-names"]');
  const otherNamesContainer = document.getElementById("other-names-container");
  const nameFieldsWrapper = document.getElementById("name-fields-wrapper");
  const addNameBtn = document.getElementById("add-name-btn");

  function addNameField() {
    const field = document.createElement("div");
    field.className = "flex space-x-4 mb-2 items-center";
    field.innerHTML = `
      <div>
        <label class="block text-xs">Other Surnames Used</label>
        <input type="text" class="form-control form-control-sm" required />
      </div>
      <div>
        <label class="block text-xs">Other Given Names Used</label>
        <input type="text" class="form-control form-control-sm" required />
      </div>
      <button type="button" class="btn btn-danger btn-sm remove-name-btn">Remove</button>
    `;
    field.querySelector(".remove-name-btn").addEventListener("click", () => field.remove());
    nameFieldsWrapper.appendChild(field);
  }
otherNamesRadios.forEach(radio => {
  radio.addEventListener("change", () => {
    if (radio.value === "yes") {
      toggleSection(otherNamesContainer, true);
      if (nameFieldsWrapper.children.length === 0) {
        addNameField();
      }
    } else {
      toggleSection(otherNamesContainer, false);
      nameFieldsWrapper.innerHTML = "";
    }
  });
});

  addNameBtn.addEventListener("click", addNameField);

  const telecodeRadios = document.querySelectorAll('input[name="telecode-names"]');
  const telecodeFields = document.getElementById("telecode-fields");
telecodeRadios.forEach(radio => {
  radio.addEventListener("change", () => {
    if (radio.value === "yes" && radio.checked) {
      toggleSection(telecodeFields, true);
    } else if (radio.value === "no" && radio.checked) {
      toggleSection(telecodeFields, false);
    }
  });

  if (radio.value === "yes" && radio.checked) {
    toggleSection(telecodeFields, true);
  }
  if (radio.value === "no" && radio.checked) {
    toggleSection(telecodeFields, false);
  }
});

  showStep(currentStep);
});
