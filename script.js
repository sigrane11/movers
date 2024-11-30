// SIDEBAR DROPDOWN
const allDropdown = document.querySelectorAll('#sidebar .side-dropdown');
const sidebar = document.getElementById('sidebar');

allDropdown.forEach(item=> {
	const a = item.parentElement.querySelector('a:first-child');
	a.addEventListener('click', function (e) {
		e.preventDefault();

		if(!this.classList.contains('active')) {
			allDropdown.forEach(i=> {
				const aLink = i.parentElement.querySelector('a:first-child');

				aLink.classList.remove('active');
				i.classList.remove('show');
			})
		}

		this.classList.toggle('active');
		item.classList.toggle('show');
	})
})





// SIDEBAR COLLAPSE
// const toggleSidebar = document.querySelector('nav .toggle-sidebar');
// const allSideDivider = document.querySelectorAll('#sidebar .divider');

// if(sidebar.classList.contains('hide')) {
// 	allSideDivider.forEach(item=> {
// 		item.textContent = '-'
// 	})
// 	allDropdown.forEach(item=> {
// 		const a = item.parentElement.querySelector('a:first-child');
// 		a.classList.remove('active');
// 		item.classList.remove('show');
// 	})
// } else {
// 	allSideDivider.forEach(item=> {
// 		item.textContent = item.dataset.text;
// 	})
// }
// Select the sidebar and the toggle button
const toggleSidebar = document.querySelector('.toggle-sidebar');
const toggleSidebaridebar = document.querySelector('#sidebar');

// Add event listener to toggle button
toggleSidebar.addEventListener('click', function() {
    // Toggle the 'hidden' class on the sidebar
    sidebar.classList.toggle('hidden');
});

document.addEventListener('DOMContentLoaded', function () {
	const navbar = document.querySelector('nav');
	const sidebar = document.getElementById('sidebar');
	const content = document.getElementById('content');

	// Function to toggle the navbar width
	toggleSidebar.addEventListener('click', function () {
		// Toggle the full-width class on navbar
		navbar.classList.toggle('full-width');

		// Hide sidebar and expand content to full width if navbar is full-width
		if (navbar.classList.contains('full-width')) {
			sidebar.style.display = 'none';
			content.style.left = '0';
			content.style.width = '100%';
		} else {
			sidebar.style.display = 'block';
			content.style.left = '260px'; // Adjust if needed
			content.style.width = 'calc(100% - 260px)';
		}
	});
});


toggleSidebar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');

	if(sidebar.classList.contains('hide')) {
		allSideDivider.forEach(item=> {
			item.textContent = '-'
		})

		allDropdown.forEach(item=> {
			const a = item.parentElement.querySelector('a:first-child');
			a.classList.remove('active');
			item.classList.remove('show');
		})
	} else {
		allSideDivider.forEach(item=> {
			item.textContent = item.dataset.text;
		})
	}
})




sidebar.addEventListener('mouseleave', function () {
	if(this.classList.contains('hide')) {
		allDropdown.forEach(item=> {
			const a = item.parentElement.querySelector('a:first-child');
			a.classList.remove('active');
			item.classList.remove('show');
		})
		allSideDivider.forEach(item=> {
			item.textContent = '-'
		})
	}
})





sidebar.addEventListener('mouseenter', function () {
	if(this.classList.contains('hide')) {
		allDropdown.forEach(item=> {
			const a = item.parentElement.querySelector('a:first-child');
			a.classList.remove('active');
			item.classList.remove('show');
		})
		allSideDivider.forEach(item=> {
			item.textContent = item.dataset.text;
		})
	}
})

document.addEventListener("DOMContentLoaded", function () {
    const notificationBtn = document.getElementById("notification-btn");
    const notificationDropdown = document.getElementById("notification-dropdown");
    const notificationCount = document.getElementById("notification-count");

    // Toggle notification dropdown
    notificationBtn.addEventListener("click", function (e) {
        e.preventDefault();
        notificationDropdown.style.display = (notificationDropdown.style.display === "block") ? "none" : "block";
    });

    // Sample function to add a new notification (you can customize it)
    function addNotification(message) {
        const ul = notificationDropdown.querySelector("ul");
        const li = document.createElement("li");
        const a = document.createElement("a");
        a.href = "#";
        a.textContent = message;
        li.appendChild(a);
        ul.insertBefore(li, ul.firstChild); // Insert new notification at the top

        // Update badge count
        let count = parseInt(notificationCount.textContent);
        notificationCount.textContent = count + 1;
        notificationCount.style.display = 'inline';
    }

    // Simulate a new notification after 5 seconds
    setTimeout(function () {
        addNotification("New booking from Client A");
    }, 5000);

    // Close notification dropdown when clicking outside
    document.addEventListener("click", function (event) {
        if (!notificationBtn.contains(event.target) && !notificationDropdown.contains(event.target)) {
            notificationDropdown.style.display = "none";
        }
    });
});



// PROFILE DROPDOWN
const profile = document.querySelector('nav .profile');
const imgProfile = profile.querySelector('img');
const dropdownProfile = profile.querySelector('.profile-link');

imgProfile.addEventListener('click', function () {
	dropdownProfile.classList.toggle('show');
})

// MENU
const allMenu = document.querySelectorAll('main .content-data .head .menu');

allMenu.forEach(item=> {
	const icon = item.querySelector('.icon');
	const menuLink = item.querySelector('.menu-link');

	icon.addEventListener('click', function () {
		menuLink.classList.toggle('show');
	})
})



window.addEventListener('click', function (e) {
	if(e.target !== imgProfile) {
		if(e.target !== dropdownProfile) {
			if(dropdownProfile.classList.contains('show')) {
				dropdownProfile.classList.remove('show');
			}
		}
	}

	allMenu.forEach(item=> {
		const icon = item.querySelector('.icon');
		const menuLink = item.querySelector('.menu-link');

		if(e.target !== icon) {
			if(e.target !== menuLink) {
				if (menuLink.classList.contains('show')) {
					menuLink.classList.remove('show')
				}
			}
		}
	})
})








// PROGRESSBAR
const allProgress = document.querySelectorAll('main .card .progress');

allProgress.forEach(item=> {
	item.style.setProperty('--value', item.dataset.value)
})






// APEXCHART
var options = {
  series: [{
  name: 'series1',
  data: [31, 40, 28, 51, 42, 109, 100]
}, {
  name: 'series2',
  data: [11, 32, 45, 32, 34, 52, 41]
}],
  chart: {
  height: 350,
  type: 'area'
},
dataLabels: {
  enabled: false
},
stroke: {
  curve: 'smooth'
},
xaxis: {
  type: 'datetime',
  categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
},
tooltip: {
  x: {
    format: 'dd/MM/yy HH:mm'
  },
},
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

var options = {
	series: [{
	name: 'Net Profit',
	data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
  }, {
	name: 'Revenue',
	data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
  }, {
	name: 'Free Cash Flow',
	data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
  }],
	chart: {
	type: 'bar',
	height: 350
  },
  plotOptions: {
	bar: {
	  horizontal: false,
	  columnWidth: '55%',
	  endingShape: 'rounded'
	},
  },
  dataLabels: {
	enabled: false
  },
  stroke: {
	show: true,
	width: 2,
	colors: ['transparent']
  },
  xaxis: {
	categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
  },
  yaxis: {
	title: {
	  text: '$ (thousands)'
	}
  },
  fill: {
	opacity: 1
  },
  tooltip: {
	y: {
	  formatter: function (val) {
		return "$ " + val + " thousands"
	  }
	}
  }
  };

  var chart = new ApexCharts(document.querySelector("#chart1"), options);
  chart.render();

  var options = {
	series: [
	{
	  data: [
		{
		  x: 'Code',
		  y: [
			new Date('2019-03-02').getTime(),
			new Date('2019-03-04').getTime()
		  ]
		},
		{
		  x: 'Test',
		  y: [
			new Date('2019-03-04').getTime(),
			new Date('2019-03-08').getTime()
		  ]
		},
		{
		  x: 'Validation',
		  y: [
			new Date('2019-03-08').getTime(),
			new Date('2019-03-12').getTime()
		  ]
		},
		{
		  x: 'Deployment',
		  y: [
			new Date('2019-03-12').getTime(),
			new Date('2019-03-18').getTime()
		  ]
		}
	  ]
	}
  ],
	chart: {
	height: 350,
	type: 'rangeBar'
  },
  plotOptions: {
	bar: {
	  horizontal: true
	}
  },
  xaxis: {
	type: 'datetime'
  }
  };

  var chart = new ApexCharts(document.querySelector("#chart2"), options);
  chart.render();

  var options = {
	series: [{
	name: "sales",
	data: [{
	  x: '2019/01/01',
	  y: 400
	}, {
	  x: '2019/04/01',
	  y: 430
	}, {
	  x: '2019/07/01',
	  y: 448
	}, {
	  x: '2019/10/01',
	  y: 470
	}, {
	  x: '2020/01/01',
	  y: 540
	}, {
	  x: '2020/04/01',
	  y: 580
	}, {
	  x: '2020/07/01',
	  y: 690
	}, {
	  x: '2020/10/01',
	  y: 690
	}]
  }],
	chart: {
	type: 'bar',
	height: 380
  },
  xaxis: {
	type: 'category',
	labels: {
	  formatter: function(val) {
		return "Q" + dayjs(val).quarter()
	  }
	},
	group: {
	  style: {
		fontSize: '10px',
		fontWeight: 700
	  },
	  groups: [
		{ title: '2019', cols: 4 },
		{ title: '2020', cols: 4 }
	  ]
	}
  },
  title: {
	  text: 'Grouped Labels on the X-axis',
  },
  tooltip: {
	x: {
	  formatter: function(val) {
		return "Q" + dayjs(val).quarter() + " " + dayjs(val).format("YYYY")
	  }  
	}
  },
  };

  var chart = new ApexCharts(document.querySelector("#chart3"), options);
  chart.render();