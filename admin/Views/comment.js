//Testimonial Data
const testimonials = [
    {
      name: "Eva Sawyer",
      Ratings: "5",
      image: "Images/Admin.jpg",
      testimonial:
        " Very Good Experience.Thank you.",
    },
    {
      name: "Katey Topaz",
      Ratings: "2",
      image: "Images/Admin.jpg",
      testimonial:
        " sit amet nullaejhl eifh;KUHEFLKJhliuehf LUHEFIuhefi oEHFYO 8YEOF8Yoeho8YE FOeyfo8YEOF EYF",
    },
    {
      name: "Jae Robin",
      Ratings: "3",
      image: "Images/Admin.jpg",
      testimonial:
        " sit amet nullaejhl eifh;KUHEFLKJhliuehf LUHEFIuhefi oEHFYO 8YEOF8Yoeho8YE FOeyfo8YEOF EYF",
    },
    {
      name: "Nicola Blakely",
      Ratings: "4",
      image: "Images/Admin.jpg",
      testimonial:
        " sit amet nullaejhl eifh;KUHEFLKJhliuehf LUHEFIuhefi oEHFYO 8YEOF8Yoeho8YE FOeyfo8YEOF EYF",
    },
  ];
  
  //Current Slide
  let i = 0;
  //Total Slides
  let j = testimonials.length;
  let testimonialContainer = document.getElementById("testimonial-container");
  let nextBtn = document.getElementById("next");
  let prevBtn = document.getElementById("prev");
  nextBtn.addEventListener("click", () => {
    i = (j + i + 1) % j;
    displayTestimonial();
  });
  prevBtn.addEventListener("click", () => {
    i = (j + i - 1) % j;
    displayTestimonial();
  });
  let displayTestimonial = () => {
    if(testimonials[i].Ratings == "1")
  {
    testimonials[i].Ratings = "Images/1-Star.PNG";
  }
  else if(testimonials[i].Ratings == "2"){
    testimonials[i].Ratings = "Images/2-Star.PNG";
  }
  else if(testimonials[i].Ratings == "3"){
    testimonials[i].Ratings = "Images/3-Star.PNG";
  }
  else if(testimonials[i].Ratings == "4"){
    testimonials[i].Ratings = "Images/4-Star.PNG";
  }
  else if(testimonials[i].Ratings == "5"){
    testimonials[i].Ratings = "Images/5-Star.PNG";
  }
    testimonialContainer.innerHTML = `
      <p>${testimonials[i].testimonial}</p>
      <img src=${testimonials[i].image}>
      <h3>${testimonials[i].name}</h3>
      <h6><img src=${testimonials[i].Ratings}><h6>
    `;
  };
  window.onload = displayTestimonial;