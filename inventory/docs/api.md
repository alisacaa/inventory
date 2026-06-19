# Inventory System API v1
Base URL: `http://localhost:8000/api/v1`

## Auth
POST /register
Body: { name, email, password, password_confirmation }
Response 201: { "success": true, "data": { "user": …, "token": … }, "message": "User registered" }

POST /login
Body: { email, password }
Response 200: { "success": true, "data": { "token": … }, "message": "Login success" }

## Categories
GET    /categories
POST   /categories        Body: { name }
GET    /categories/{id}
PUT    /categories/{id}   Body: { name }
DELETE /categories/{id}   (admin only)

## Items
GET    /items
POST   /items             Body: { name, quantity, price, category_id }
GET    /items/{id}
PUT    /items/{id}
DELETE /items/{id}        (admin only) 
### Filter Items by Category

Endpoint:

GET /items?category_id={id}

Contoh Request:

GET /items?category_id=1

Deskripsi:
Mengembalikan item berdasarkan kategori tertentu.

Response 200:

{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "Laptop",
      "category_id": 1
    }
  ],
  "message": "Items retrieved successfully"
}
