// Grab our <section> element for output.
const apiTestElement = document.getElementById( 'api-test' );

/**
 * Make a request for all pets to the API.
 */
// Set the request URL.
fetch( 'http://localhost:3000/api/pets.php' )
  // Convert the response from a string to an object.
  .then( response => response.json() )
  // Use the data (object)!
  .then( pets => {
    console.log(pets);  
    const heading = document.createElement( 'H2' );
    heading.textContent = 'Pets';
    const list = document.createElement( 'UL' );
    for ( const petName in pets ) {
      const listItem = document.createElement( 'LI' );
      listItem.innerHTML = `
        <h3>${petName}</h3>
        <dl>
          <dt>Age</dt>
          <dd>${pets[petName].age}</dd>
          <dt>Type</dt>
          <dd>${pets[petName].type}</dd>
        </dl>
        <h4>Tricks</h4>
      `;
      const tricksList = document.createElement( 'UL' );
      for (const trick of pets[petName].tricks ) {
        tricksList.innerHTML += `<li>${trick}</li>`;
      }
      listItem.appendChild( tricksList );
      list.appendChild( listItem );
    }
    apiTestElement.appendChild( list );
  } );