import { fetch } from "../ajax.js";
import { notifyUser } from "../login.js";

let action = "all";
let param = new URLSearchParams(window.location.search);
let role = param.get("role");
let userdata = [];
let profileLoaded=0;
let searchInput = document.getElementById("search");


    searchInput.addEventListener("input", function(){   
    action = searchInput.value.trim() === "" ? "all" : searchInput.value.trim();
    Load_user_data();
    console.log("Search input:", searchInput.value);
});

function normalizeStatus(status) {
  return String(status || "inactive")
    .toLowerCase()
    .trim();
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
    { action, role },
    "../../controllers/admin/fetchusers.php",
    function (response) {
      console.log(response);
      userdata = response;
      loadtable();
      loadprofile(profileLoaded);
    },
  );
}

function loadtable() {
  let tablebody = document.getElementById("table-body");
  tablebody.innerHTML = "";
  for (let i = 0; i < userdata.length; i++) {
    tablebody.innerHTML += `
            <tr>
                <td>${userdata[i].name}</td>
                <td>${userdata[i].UID}</td>
                <td>${renderStatusBadge(userdata[i].status)}</td>
                <td><button  class="view-profile-btn">View Profile</button></td>
            </tr>
`;
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
  document.getElementById("profile-img").src =
    "https://plus.unsplash.com/premium_photo-1689568126014-06fea9d5d341?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cHJvZmlsZXxlbnwwfHwwfHx8MA%3D%3D";
  document.getElementById("name").textContent =
    userdata[index].name.charAt(0).toUpperCase() +
    userdata[index].name.slice(1);
  document.getElementById("ID").textContent = "ID: " + userdata[index].UID;
  document.getElementById("roles").textContent =
    "Role: " +
    userdata[index].role.charAt(0).toUpperCase() +
    userdata[index].role.slice(1);
  document.getElementById("email").textContent =
    "Email: " +
    userdata[index].email.charAt(0).toUpperCase() +
    userdata[index].email.slice(1);
  document.getElementById("phone").textContent =
    "Phone: " + userdata[index].phone;
  // document.getElementById('address').textContent="Address: "+userdata[index].address;
  const profileStatus = document.getElementById("status");
  const statusMeta = getStatusMeta(userdata[index].status);
  profileStatus.className = `status-badge ${statusMeta.className}`;
  profileStatus.innerHTML = `<span class="status-dot"></span>${statusMeta.label} ${userdata[index].status === "temp_ban" ? ` until ${userdata[index].temp_ban}` : ""}`;
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
            }
            else{
                notifyUser("Failed to update profile", "error");
            }
          },
        );
      });
    }
  });
}
