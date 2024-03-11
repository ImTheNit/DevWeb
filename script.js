// Créer le contenu HTML pour un gâteau
function createCategoryHtml(categoryName, item) {
    const container = document.createElement('div');
    container.className = 'category-container';
  
    const heading = document.createElement('h2');
    heading.textContent = categoryName;
    container.appendChild(heading);
  
    const image = document.createElement('img');
    image.src = item.image_link;
    image.alt = item.name;
    image.className = 'category-image';
    container.appendChild(image);
  
    const name = document.createElement('h3');
    name.textContent = item.name;
    container.appendChild(name);
  
    const description = document.createElement('p');
    description.textContent = item.description;
    container.appendChild(description);
  
    const link = document.createElement('a');
    link.textContent = 'Découvrir plus';
    link.href = `./${categoryName.toLowerCase().replace(/\s+/g, '-')}.php`; // Lien vers la page de la catégorie
    link.className = 'category-link';
    container.appendChild(link);
  
    return container;
  }
  

  function displayCategories(data) {
    const categoriesContainer = document.getElementById('categories-container');
  
    for (const categoryName in data) {
      const categoryItems = data[categoryName];
      const categoryHtml = createCategoryHtml(categoryName, categoryItems[0]); 
      categoriesContainer.appendChild(categoryHtml);
    }
  }
  
  // Charger les données du fichier JSON et afficher les catégories
  function loadAndDisplayCategories() {
    fetch('data.json') 
      .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json();
      })
      .then(data => {
        displayCategories(data);
      })
      .catch(error => {
        console.error('Could not load categories:', error);
      });
  }
  
  // Appeler cette fonction quand la fenêtre charge
  window.addEventListener('load', loadAndDisplayCategories);
  