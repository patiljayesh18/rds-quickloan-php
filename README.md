🚀 RDS-Quickloan_PHP
A hands-on AWS cloud deployment project demonstrating how to host a PHP-based loan management system with high availability, scalability, and security using core AWS services.

📋 Project Requirements :-

✅ Amazon VPC
✅ EC2 (App Server)
✅ Security Groups
✅ Amazon RDS (MySQL)
✅ Amazon S3 (Static content)
✅ AMI (Amazon Machine Image)
✅ Application Load Balancer
✅ Auto Scaling Group
✅ EC2 Launch Template
✅ Route53 / NOIP (For demo DNS)

🧱 Technologies Installed
Component	Technology
OS	Amazon Linux 2
Web Server	Nginx
Backend	PHP
Database	MySQL (RDS)
Frontend	HTML, CSS, JS

⚙️ AWS Infrastructure Setup
Component	Status	Description
VPC	✅	Proj-vpc created
Subnets	✅	2 Public + 3 Private (for DB)
Route Table	✅	PubRT-ProjVPC for public subnets
Internet Gateway	✅	Attached to VPC
Security Groups	✅	App Server SG + RDS SG
App Server SG	✅	Inbound: SSH (22), HTTP (80)
RDS SG	✅	Allows MySQL from App Server SG (3306)
EC2 Launch Template	✅	Created from custom AMI
AMI	✅	Includes PHP + Nginx
Auto Scaling Group	✅	Scaling based on traffic
Load Balancer	✅	Distributes traffic across EC2 instances
RDS Instance	✅	Private subnet, MySQL engine
S3 Bucket	✅	For storing images and static files

🏗️ Architecture Overview :-



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
     


🔐 Security Notes
App Server SG: Allows SSH (22) and HTTP (80)
RDS SG: Allows only MySQL (3306) from App Server SG
AMI: Custom EC2 image with pre-installed PHP & Nginx
Auto Scaling: Configured for dynamic traffic management



💡 Project Highlights
Hosted using best AWS practices
Scalable and fault-tolerant architecture
Clean separation of compute and database layers
Fully cloud-native deployment
