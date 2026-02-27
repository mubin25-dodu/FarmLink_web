import { fetch } from "../ajax.js";
import { notifyUser } from "../login.js";

let action = "all";
let param = new URLSearchParams(window.location.search);
let role = param.get("role");
let userdata = [];
let profileLoaded = 0;
let searchInput = document.getElementById("search");
let offset = 0;
let limit = 10;
let currentPage = 1;
let lastFetchedCount = 0;
let filter;

// reading input feald
searchInput.addEventListener("input", function () {
  action = searchInput.value.trim() === "" ? "all" : searchInput.value.trim();
  Load_user_data();
  // console.log("Search input:", searchInput.value);
});

function normalizeStatus(status) {
  return String(status || "inactive")
    .toLowerCase()
    .trim();
}

// pagination logic here
let prevBtn = document.getElementById("prev-btn");
let nextBtn = document.getElementById("next-btn");
let btn1 = document.getElementById("btn1");
let btn2 = document.getElementById("btn2");
let btn3 = document.getElementById("btn3");

function goToPage(targetPage) {
  if (targetPage < 1) return;
  currentPage = targetPage;
  offset = (currentPage - 1) * limit;
  profileLoaded = 0;
  Load_user_data();
}

function updatePaginationUI() {
  if (!(prevBtn && nextBtn && btn1 && btn2 && btn3)) return;

  const startPage = Math.max(1, currentPage - 1);
  const pageNumbers = [startPage, startPage + 1, startPage + 2];
  const numberButtons = [btn1, btn2, btn3];

  numberButtons.forEach((button, index) => {
    const pageNumber = pageNumbers[index];
    button.textContent = pageNumber;
    button.parentElement.classList.toggle("active", pageNumber === currentPage);
  });

  prevBtn.style.display = currentPage === 1 ? "none" : "block";

  const hasNextPage = lastFetchedCount === limit;
  nextBtn.classList.toggle("disabled", !hasNextPage);
  nextBtn.style.pointerEvents = hasNextPage ? "auto" : "none";
  nextBtn.style.opacity = hasNextPage ? "1" : "0.55";
}

if (prevBtn && nextBtn && btn1 && btn2 && btn3) {
  prevBtn.addEventListener("click", function (event) {
    event.preventDefault();
    if (currentPage > 1) {
      goToPage(currentPage - 1);
    }
  });

  [btn1, btn2, btn3].forEach((button) => {
    button.addEventListener("click", function (event) {
      event.preventDefault();
      const targetPage = Number(button.textContent);
      if (!Number.isNaN(targetPage)) {
        goToPage(targetPage);
      }
    });
  });

  nextBtn.addEventListener("click", function (event) {
    event.preventDefault();
    if (lastFetchedCount === limit) {
      goToPage(currentPage + 1);
    }
  });

  updatePaginationUI();
}
// filter buttons logic here
let active = document.getElementById("Active");
let inactive = document.getElementById("Inactive");
let banned = document.getElementById("Banned");
let all = document.getElementById("All");
if (all) {
  all.addEventListener("change", function () {
    filter = "";
    Load_user_data();
  });
}
if (inactive) {
  inactive.addEventListener("change", function () {
    filter = "inactive";
    Load_user_data();
  });
}
if (active) {
  active.addEventListener("change", function () {
    filter = "active";
    Load_user_data();
  });
}
if (banned) {
  banned.addEventListener("change", function () {
    filter = "banned";
    Load_user_data();
  });
}

function getStatusMeta(status) {
  const normalized = normalizeStatus(status);

  if (normalized === "active") {
    return { label: "Active", className: "status-active" };
  }
  if (normalized === "inactive") {
    return { label: "Inactive", className: "status-inactive" };
  }
  if (normalized === "banned") {
    return { label: "Banned", className: "status-banned" };
  }
  if (normalized === "temp_ban") {
    return { label: "Temp Ban", className: "status-temp_ban" };
  }

  return { label: "Unknown", className: "status-inactive" };
}

function renderStatusBadge(status) {
  const meta = getStatusMeta(status);
  return `<span class="status-badge ${meta.className}"><span class="status-dot"></span>${meta.label}</span>`;
}

Load_user_data();
function Load_user_data() {
  fetch(
    { action: action,filter: filter, role: role, offset: offset, limit: limit },
    "../../controllers/admin/fetchusers.php",
    function (response) {
      userdata = Array.isArray(response) ? response : [];
      lastFetchedCount = userdata.length;
      console.log("Fetched users:", response);
      if (userdata.length === 0 && currentPage > 1) {
        goToPage(currentPage - 1);
        return;
      }

      updatePaginationUI();

      if (userdata.length === 0) {
        loadtable([]);
        document.getElementById("profile").style.display = "none";
        notifyUser("No users found", "orange");
      } else {
        loadtable(userdata);
        loadprofile(Math.min(profileLoaded, userdata.length - 1));
      }
    },
  );
}

function loadtable(data) {
  let tablebody = document.getElementById("table-body");
  tablebody.innerHTML = "";
  for (let i = 0; i < data.length; i++) {
    tablebody.innerHTML += `
            <tr>
                <td>${data[i].name}</td>
                <td>${data[i].UID}</td>
                <td>${renderStatusBadge(data[i].status)}</td>
                <td><button  class="view-profile-btn">View Profile</button></td>
            </tr>
`;
  }

  //  filter buttons logic
  let active = document.getElementById("Active");
  let inactive = document.getElementById("Inactive");
  let banned = document.getElementById("Banned");
  let all = document.getElementById("All");
  if (active || inactive || banned || all) {
    active.addEventListener("change", function () {
      Load_user_data();
    });
    inactive.addEventListener("change", function () {});
    banned.addEventListener("change", function () {});
    all.addEventListener("change", function () {});
  }

  let view = document.querySelectorAll(".view-profile-btn");

  if (view) {
    for (let i = 0; i < view.length; i++) {
      view[i].addEventListener("click", function () {
        console.log(i);
        loadprofile(i);
      });
    }
  }
}
function loadprofile(index) {
  profileLoaded = index;
  const selectedUser = userdata[index];
  if (!selectedUser) {
    document.getElementById("profile").style.display = "none";
    return;
  }
  document.getElementById("profile-img").src =
    "https://plus.unsplash.com/premium_photo-1689568126014-06fea9d5d341?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D";
  document.getElementById("name").textContent =
    selectedUser.name.charAt(0).toUpperCase() + selectedUser.name.slice(1);
  document.getElementById("ID").textContent = "ID: " + selectedUser.UID;
  document.getElementById("roles").textContent =
    "Role: " +
    selectedUser.role.charAt(0).toUpperCase() +
    selectedUser.role.slice(1);
  document.getElementById("email").textContent =
    "Email: " +
    selectedUser.email.charAt(0).toUpperCase() +
    selectedUser.email.slice(1);
  document.getElementById("phone").textContent = "Phone: " + selectedUser.phone;
  document.getElementById("address").textContent =
    "Address: " + (selectedUser.address || "N/A");
  document.getElementById("city").textContent =
    "City: " + (selectedUser.city || "N/A");
  const profileStatus = document.getElementById("status");
  const statusMeta = getStatusMeta(selectedUser.status);
  profileStatus.className = `status-badge ${statusMeta.className}`;
  profileStatus.innerHTML = `<span class="status-dot"></span>${statusMeta.label} ${selectedUser.status === "temp_ban" ? ` until ${selectedUser.temp_ban}` : ""}`;
  let profileCard = document.getElementById("profile");
  profileCard.style.display = "block";
}

// edit profile modal
let button = document.getElementById("edit-profile-btn");
if (button) {
  button.addEventListener("click", function () {
    // if (role === "buyer") {
    // }
    let editStatus = document.getElementById("edit-status");
    document.getElementById("edit-modal").style.display = "flex";

    // loading the editable profile data into the edit form

    document.getElementById("edit-name").value = userdata[profileLoaded].name;
    document.getElementById("edit-email").value = userdata[profileLoaded].email;
    document.getElementById("edit-phone").value = userdata[profileLoaded].phone;
    document.getElementById("edit-address").value =
      userdata[profileLoaded].address;
    document.getElementById("edit-city").value = userdata[profileLoaded].city;
    document.getElementById("edit-status").value =
      userdata[profileLoaded].status;
    document.getElementById("edit-date").value =
      userdata[profileLoaded].ban_end_date;

    //editstatus change here
    editStatus.addEventListener("change", function () {
      console.log(editStatus.value);
      if (editStatus.value === "temp_ban") {
        document.querySelectorAll(".edit-date").forEach((el) => {
          el.style.display = "block";
        });
      } else {
        document.querySelectorAll(".edit-date").forEach((el) => {
          el.style.display = "none";
        });
      }
    });

    if (document.getElementById("cancel-edit-btn")) {
      document
        .getElementById("cancel-edit-btn")
        .addEventListener("click", function () {
          document.getElementById("edit-modal").style.display = "none";
        });
    }
    //save edit button logic here
    let saveBtn = document.getElementById("save-profile-btn");
    if (saveBtn) {
      saveBtn.addEventListener("click", function () {
        document.getElementById("edit-modal").style.display = "none";
        const status = editStatus.value;
        const date = document.getElementById("edit-date").value;
        fetch(
          { status: status, date: date, UID: userdata[profileLoaded].UID },
          "../../controllers/admin/edituser.php",
          function (response) {
            if (response.status === "success") {
              Load_user_data();

              loadprofile(profileLoaded);
              notifyUser("Profile updated successfully", "success");
            } else {
              notifyUser("Failed to update profile", "error");
            }
          },
        );
      });
    }
  });
}
