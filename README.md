# Project Name: RDS-Quickloan_PHP

A hands-on cloud deployment project that demonstrates how to host a PHP-based loan management system on AWS with high availability, scalability, and security.

# 📋 Project Requirements

- ✅ Amazon VPC
- ✅ EC2 (App Server)
- ✅ Security Groups
- ✅ Amazon RDS (MySQL)
- ✅ Amazon S3 (Static content)
- ✅ AMI (Amazon Machine Image)
- ✅ Load Balancer (Application Load Balancer)
- ✅ Auto Scaling Group
- ✅ EC2 Launch Template
- ✅ Route53 (NOIP for demo)

---

## 🧱 Technologies Installed

- **OS:** Amazon Linux 2
- **Web Server:** Nginx
- **Language:** PHP
- **Database:** MySQL
- **Frontend Code:** HTML, CSS, JavaScript

---

## ⚙️ 
| Component | Status | Details |
|----------|--------|---------|
| **VPC** | ✅ Created | Name: `Proj-vpc` |
| **Subnets** | ✅ Created | 5 Subnets: 2 Public (App), 3 Private (DB) |
| **Route Table** | ✅ Created | `PubRT-ProjVPC` for public subnets |
| **Internet Gateway** | ✅ Created | Attached to VPC |
| **Security Groups** | ✅ Created | |
| App Server SG | ✅ | Inbound: SSH (22), HTTP (80) |
| RDS SG | ✅ | *(To be created: Allow MySQL from App SG)* |
| **EC2 Launch Template** | ✅ | *(To be created)* |
| **AMI** | ✅ | *(To be created from EC2 instance)* |
| **Auto Scaling Group** | ✅ 
| **Application Load Balancer** | ✅
| **RDS Instance** | ✅ | *(MySQL in private subnet)* |
| **S3 Bucket** | ✅ | *(For storing static assets/images)* |

---

## Architecture Overview

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


App Server SG: Allows SSH (22), HTTP (80)
RDS SG: Only allows MySQL (3306) from App Server SG
AMI: Custom image of EC2 with Nginx + PHP pre-installed
Launch Template: Built from AMI for easy scaling
Auto Scaling Group: Manages EC2 instance scaling based on load

