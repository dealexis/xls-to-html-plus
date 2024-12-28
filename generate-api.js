import fs from 'fs';
import path from 'path';

//this file is not used but can be modified for your own convenience

// Load the Postman collection JSON file
const postmanCollectionPath = path.resolve('./api.json'); // Update with your Postman collection path
const collection = JSON.parse(fs.readFileSync(postmanCollectionPath, 'utf-8'));

// Function to extract routes and parameters
function extractRoutes(collection) {
    const routes = [];
    const items = collection.item || [];

    items.forEach((item) => {
        console.log(item)
        if (item.request) {
            const method = item.request.method;
            const url = item.request.url.raw || item.request.url;
            const params = item.request.body?.raw
                ? JSON.parse(item.request.body.raw)
                : {};
            routes.push({method, url, params});
        } else if (item.item) {
            // If it's a folder, recurse
            routes.push(...extractRoutes(item));
        }
    });

    return routes;
}

// Generate minimal HTML
function generateHtml(routes) {
    let html = `
        <table>
            <thead>
                <tr>
                    <th>Method</th>
                    <th>URL</th>
                    <th>Parameters</th>
                </tr>
            </thead>
            <tbody>
    `;

    routes.forEach((route) => {
        console.log(route)
        html += `
            <tr>
                <td>${route.method}</td>
                <td>${route.url}</td>
                <td>${JSON.stringify(route.params, null, 2)}</td>
            </tr>
        `;
    });

    html += `
            </tbody>
        </table>`;

    return html;
}

// Extract routes and generate HTML
const routes = extractRoutes(collection);
const html = generateHtml(routes);

// Save HTML to a file
//fs.writeFileSync(path.resolve('./', 'api-documentation.html'), html);
console.log('API documentation generated as api-documentation.html');
