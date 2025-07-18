# 💼 Project Name: RDS-Quickloan_PHP

A hands-on cloud deployment project that demonstrates how to host a PHP-based loan management system on **AWS** with **high availability**, **scalability**, and **security**.

---

## 📋 Project Requirements

- ✅ Amazon VPC  
- ✅ EC2 (App Server)  
- ✅ Security Groups  
- ✅ Amazon RDS (MySQL)  
- ✅ Amazon S3 (Static content)  
- ✅ AMI (Amazon Machine Image)  
- ✅ Load Balancer (Application Load Balancer)  
- ✅ Auto Scaling Group  
- ✅ EC2 Launch Template  
- ✅ Route 53 (NOIP used for demo)

---

## 🧱 Technologies Used

| Component      | Technology             |
|----------------|------------------------|
| OS             | Amazon Linux 2         |
| Web Server     | Nginx                  |
| Backend        | PHP                    |
| Database       | MySQL (Amazon RDS)     |
| Frontend       | HTML, CSS, JavaScript  |

---

## ⚙️ Deployment Status

| Component               | Status  | Details                                  |
|-------------------------|---------|------------------------------------------|
| **VPC**                 | ✅      | Name: `Proj-vpc`                         |
| **Subnets**             | ✅      | 5 Subnets: 2 Public (App), 3 Private (DB)|
| **Route Table**         | ✅      | `PubRT-ProjVPC` for public subnets       |
| **Internet Gateway**    | ✅      | Attached to VPC                          |
| **Security Groups**     | ✅      | `App Server SG`: SSH(22), HTTP(80)       |
|                         |         | `RDS SG`: Allows MySQL(3306) from App SG |
| **EC2 Launch Template** | ✅      | Created from AMI                         |
| **AMI**                 | ✅      | Custom AMI with PHP + Nginx              |
| **Auto Scaling Group**  | ✅      | Configured with launch template          |
| **Load Balancer (ALB)** | ✅      | Application Load Balancer setup          |
| **RDS Instance**        | ✅      | MySQL DB in Private Subnet               |
| **S3 Bucket**           | ✅      | Hosting static assets/images             |

---

## 📐 Architecture Overview

``
                    ┌────────────────────┐
                    │      Users         │
                    └────────┬───────────┘
                             │
                  (Public Internet Access)
                             │
                    ┌────────▼─────────┐
                    │ Application Load │
                    │   Balancer (ALB) │
                    └────────┬─────────┘
                             │
           ┌────────────────┴────────────────┐
           │                                 │
   ┌───────▼────────┐               ┌────────▼────────┐
   │   EC2 Instance │               │   EC2 Instance  │
   │ (PHP + Nginx)  │               │ (PHP + Nginx)   │
   └───────┬────────┘               └────────┬────────┘
           │                                 │
           └───────┐         ┌───────────────┘
                   ▼         ▼
         ┌────────────────────────┐
         │   Amazon RDS (MySQL)   │
         │ (Private Subnet Only)  │
         └────────────────────────┘

                   ▲
                   │
     ┌─────────────┴──────────────┐
     │    Amazon S3 (Images &     │
     │  Static Content Hosting)   │
     └────────────────────────────┘
