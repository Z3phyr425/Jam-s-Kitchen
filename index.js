window.onload = function() {
    fetch('recipes.json')
    .then(res => res.json())
    .then(json => {
        const recipes = json.recipes;
        const parentElement = document.getElementById('productContainer');

        if (!parentElement) {
            console.error('Parent element not found!');
            return;
        }

        recipes.forEach(recipe => {
            let recipeDiv = document.createElement('div');
            let recipeImg = document.createElement('img');
            let recipeName = document.createElement('h4');
            let recipeBtn = document.createElement('button');

            recipeBtn.innerHTML = "Show Recipe";

            recipeBtn.addEventListener('click', () => {
                showRecipe(recipe.id);
            });

            recipeImg.src = recipe.image;
            recipeImg.style.width = "10rem";
            recipeImg.style.height = "10rem";

            recipeName.style.color = "#E1ACAC";
            recipeName.innerHTML = recipe.name;

            recipeDiv.id = `recipe-${recipe.id}`;
            recipeDiv.style.width = "10rem";
            recipeDiv.style.height = "20rem";
            recipeDiv.style.backgroundColor = "#fff";
            recipeDiv.style.margin = "0.3rem";
            recipeDiv.style.padding = "0.3rem";
            recipeDiv.style.borderRadius = "0.3rem";
            recipeDiv.style.color = "#A87676";
            recipeDiv.style.textAlign = "center";

            recipeDiv.appendChild(recipeImg);
            recipeDiv.appendChild(recipeName);
            recipeDiv.appendChild(recipeBtn);

            parentElement.appendChild(recipeDiv);
        });
    })
    .catch(error => {
        console.error('Error fetching recipes:', error);
    });

    let recipeDetails = document.getElementById('recipes');
    function showRecipe(recipeId) {
        if(recipeId == 1){
            recipeDetails.innerHTML = `Classic Margeritta Pizza

- Pizza dough (homemade or store-bought)
- Tomato sauce (preferably San Marzano tomatoes)
- Fresh mozzarella cheese
- Fresh basil leaves
- Olive oil
- Salt and pepper to taste

1. Preheat your oven to the highest temperature (usually around 500°F or 260°C).
2. Roll out the pizza dough into a circle on a lightly floured surface.
3. Transfer the dough to a pizza peel or baking sheet lined with parchment paper.
4. Spread a thin layer of tomato sauce evenly over the dough, leaving a border around the edges.
5. Tear the fresh mozzarella into small pieces and distribute them evenly over the sauce.
6. Drizzle a little olive oil over the pizza and season with salt and pepper.
7. Slide the pizza onto a preheated pizza stone or baking sheet in the oven.
8. Bake for 8-10 minutes, or until the crust is golden brown and the cheese is melted and bubbly.
9. Remove the pizza from the oven and let it cool slightly.
10. Tear fresh basil leaves and scatter them over the pizza before serving. Enjoy your classic Margherita pizza!`
        }else if(recipeId == 2){
            recipeDetails.innerHTML = `Vegetarian Stir-fry

- Assorted vegetables (such as bell peppers, broccoli, carrots, snap peas, mushrooms, onions, etc.)
- Firm tofu or tempeh (optional, for added protein)
- Soy sauce (or tamari for gluten-free option)
- Garlic
- Ginger
- Sesame oil
- Vegetable oil (for stir-frying)
- Cornstarch (optional, for thickening the sauce)
- Rice or noodles (for serving)

1. Prepare your choice of vegetables by washing, peeling, and chopping them into bite-sized pieces.
2. If using tofu or tempeh, press it to remove excess moisture, then cut into cubes or slices.
3. Mince garlic and ginger.
4. In a small bowl, mix soy sauce with a splash of sesame oil. You can also add a teaspoon of cornstarch to thicken the sauce if desired.
5. Heat vegetable oil in a large skillet or wok over medium-high heat.
6. Add minced garlic and ginger to the hot oil and stir-fry for about 30 seconds until fragrant.
7. Add the tofu or tempeh to the skillet and cook until golden brown on all sides (if using).
8. Add the chopped vegetables to the skillet and stir-fry for 5-7 minutes, or until they are tender-crisp.
9. Pour the soy sauce mixture over the vegetables and tofu, stirring well to coat evenly.
10. Continue to cook for another 2-3 minutes, allowing the sauce to thicken slightly.
11. Taste and adjust seasoning if necessary.
12. Serve the vegetarian stir-fry hot over cooked rice or noodles. Enjoy your flavorful and nutritious meal!`
        }else if(recipeId == 3){
            recipeDetails.innerHTML = `Chocolate Chip Cookies 

- All-purpose flour
- Baking soda
- Salt
- Unsalted butter, softened
- Granulated sugar
- Brown sugar
- Vanilla extract
- Eggs
- Chocolate chips (semi-sweet or milk chocolate)

1. Preheat your oven to 375°F (190°C) and line baking sheets with parchment paper.
2. In a medium bowl, whisk together the flour, baking soda, and salt. Set aside.
3. In a large mixing bowl, cream together the softened butter, granulated sugar, brown sugar, and vanilla extract until light and fluffy.
4. Add the eggs one at a time, beating well after each addition.
5. Gradually add the dry ingredients to the wet ingredients, mixing until just combined.
6. Fold in the chocolate chips until evenly distributed throughout the dough.
7. Using a spoon or cookie scoop, drop rounded tablespoons of dough onto the prepared baking sheets, leaving some space between each cookie for spreading.
8. Bake in the preheated oven for 8-10 minutes, or until the edges are lightly golden brown.
9. Remove from the oven and let the cookies cool on the baking sheets for a few minutes before transferring them to a wire rack to cool completely.
10. Enjoy your homemade chocolate chip cookies with a glass of milk or your favorite beverage!`
        }else if(recipeId == 4){
            recipeDetails.innerHTML = `Chicken Alfredo Pasta

- 8 oz fettuccine pasta
- 2 boneless, skinless chicken breasts, cut into bite-sized pieces
- Salt and pepper to taste
- 2 tablespoons olive oil
- 3 cloves garlic, minced
- 1 cup heavy cream
- 1/2 cup grated Parmesan cheese
- 2 tablespoons unsalted butter
- 1/4 teaspoon ground nutmeg (optional)
- Chopped parsley for garnish (optional)

1. Cook the fettuccine pasta according to package instructions until al dente. Drain and set aside.
2. Season the chicken pieces with salt and pepper.
3. In a large skillet, heat the olive oil over medium-high heat. Add the seasoned chicken pieces and cook until they are browned and cooked through, about 5-7 minutes per side. Remove the chicken from the skillet and set aside.
4. In the same skillet, add the minced garlic and cook for about 1 minute until fragrant.
5. Lower the heat to medium and add the heavy cream, Parmesan cheese, butter, and nutmeg (if using). Stir continuously until the sauce is smooth and creamy, about 3-5 minutes.
6. Return the cooked chicken to the skillet and stir to combine with the sauce.
7. Add the cooked fettuccine pasta to the skillet and toss until the pasta is coated evenly with the sauce.
8. Serve hot, garnished with chopped parsley if desired.`
        }
    }
};
