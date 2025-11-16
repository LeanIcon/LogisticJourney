-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: nnurodb.mysql.database.azure.com
-- Generation Time: Nov 16, 2025 at 01:51 PM
-- Server version: 8.0.42-azure
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lda_max_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_guest` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `user_id`, `name`, `slug`, `email`, `avatar`, `bio`, `website`, `is_guest`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'John Smith', 'john-smith', 'john.smith@example.com', NULL, 'Senior logistics expert with over 15 years of experience in supply chain management and freight optimization.', 'https://johnsmith.com', 0, NULL, '2025-11-06 10:27:33', '2025-11-06 10:27:33'),
(2, NULL, 'Sarah Johnson', 'sarah-johnson', 'sarah.j@example.com', NULL, 'Technology writer specializing in logistics software, automation, and digital transformation in the supply chain industry.', 'https://sarahjohnson.com', 0, NULL, '2025-11-06 10:27:34', '2025-11-06 10:27:34'),
(3, NULL, 'Michael Chen', 'michael-chen', 'michael.chen@example.com', NULL, 'Logistics consultant and thought leader focusing on sustainable transportation and green supply chain practices.', NULL, 0, NULL, '2025-11-06 10:27:35', '2025-11-06 10:27:35'),
(4, NULL, 'Emily Rodriguez', 'emily-rodriguez', 'emily.r@example.com', NULL, 'Supply chain analyst with expertise in data analytics, forecasting, and inventory optimization strategies.', 'https://emilyrodriguez.com', 0, NULL, '2025-11-06 10:27:36', '2025-11-06 10:27:36'),
(5, NULL, 'David Thompson', 'david-thompson', 'david.t@example.com', NULL, 'Warehouse management specialist and operations director with focus on lean methodologies and process improvement.', NULL, 0, NULL, '2025-11-06 10:27:37', '2025-11-06 10:27:37'),
(6, NULL, 'Lisa Anderson', 'lisa-anderson', 'lisa.anderson@example.com', NULL, 'International trade expert covering customs, compliance, and cross-border logistics regulations.', 'https://lisaanderson.com', 1, NULL, '2025-11-06 10:27:37', '2025-11-06 10:27:37'),
(7, NULL, 'Robert Martinez', 'robert-martinez', 'robert.m@example.com', NULL, 'E-commerce logistics strategist helping businesses scale their fulfillment operations and last-mile delivery.', NULL, 1, NULL, '2025-11-06 10:27:38', '2025-11-06 10:27:38'),
(8, NULL, 'Jennifer Kim', 'jennifer-kim', 'jennifer.kim@example.com', NULL, 'Transportation management specialist with deep knowledge of route optimization and fleet management systems.', 'https://jenniferkim.com', 0, NULL, '2025-11-06 10:27:39', '2025-11-06 10:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint UNSIGNED NOT NULL,
  `blockable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blockable_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` json DEFAULT NULL,
  `order` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `creator_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `order` int NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `creator_id`, `name`, `slug`, `description`, `order`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Supply Chain', 'supply-chain', 'Articles about supply chain management, optimization, and best practices.', 1, '2025-11-14 20:52:47', '2025-11-06 10:27:41', '2025-11-14 20:52:47'),
(2, NULL, NULL, 'Transportation', 'transportation', 'Insights on freight, shipping, and transportation logistics.', 2, '2025-11-14 20:52:48', '2025-11-06 10:27:42', '2025-11-14 20:52:48'),
(3, NULL, NULL, 'Technology', 'technology', 'Technology trends, software solutions, and digital transformation in logistics.', 3, '2025-11-14 20:53:09', '2025-11-06 10:27:43', '2025-11-14 20:53:09'),
(4, NULL, NULL, 'Warehouse Management', 'warehouse-management', 'Warehouse operations, inventory management, and fulfillment strategies.', 4, '2025-11-14 20:53:10', '2025-11-06 10:27:44', '2025-11-14 20:53:10'),
(5, NULL, NULL, 'Industry News', 'industry-news', 'Latest news and updates from the logistics and supply chain industry.', 5, '2025-11-14 20:53:10', '2025-11-06 10:27:44', '2025-11-14 20:53:10'),
(6, 1, NULL, 'Procurement', 'procurement', 'Strategic sourcing, vendor management, and procurement processes.', 1, '2025-11-14 20:52:47', '2025-11-06 10:27:47', '2025-11-14 20:52:47'),
(7, 1, NULL, 'Demand Planning', 'demand-planning', 'Forecasting, demand sensing, and capacity planning.', 2, '2025-11-14 20:52:48', '2025-11-06 10:27:48', '2025-11-14 20:52:48'),
(8, 1, NULL, 'Risk Management', 'risk-management', 'Supply chain resilience, risk mitigation, and contingency planning.', 3, '2025-11-14 20:53:09', '2025-11-06 10:27:49', '2025-11-14 20:53:09'),
(9, 2, NULL, 'Freight Management', 'freight-management', 'LTL, FTL, and freight forwarding strategies.', 1, '2025-11-14 20:52:47', '2025-11-06 10:27:50', '2025-11-14 20:52:47'),
(10, 2, NULL, 'Last-Mile Delivery', 'last-mile-delivery', 'Final delivery strategies and urban logistics.', 2, '2025-11-14 20:52:48', '2025-11-06 10:27:51', '2025-11-14 20:52:48'),
(11, 2, NULL, 'Fleet Management', 'fleet-management', 'Vehicle tracking, maintenance, and driver management.', 3, '2025-11-14 20:53:09', '2025-11-06 10:27:52', '2025-11-14 20:53:09'),
(12, 3, NULL, 'Automation', 'automation', 'Robotics, AI, and automated warehouse systems.', 1, '2025-11-14 20:52:48', '2025-11-06 10:27:53', '2025-11-14 20:52:48'),
(13, 3, NULL, 'IoT & Tracking', 'iot-tracking', 'IoT sensors, GPS tracking, and real-time visibility solutions.', 2, '2025-11-14 20:52:49', '2025-11-06 10:27:54', '2025-11-14 20:52:49'),
(14, 3, NULL, 'Software Solutions', 'software-solutions', 'TMS, WMS, and logistics management platforms.', 3, '2025-11-14 20:53:10', '2025-11-06 10:27:55', '2025-11-14 20:53:10'),
(15, 4, NULL, 'Inventory Optimization', 'inventory-optimization', 'Stock management, cycle counting, and inventory accuracy.', 1, '2025-11-14 20:52:48', '2025-11-06 10:27:56', '2025-11-14 20:52:48'),
(16, 4, NULL, 'Order Fulfillment', 'order-fulfillment', 'Pick, pack, ship processes and fulfillment strategies.', 2, '2025-11-14 20:52:49', '2025-11-06 10:27:57', '2025-11-14 20:52:49'),
(17, NULL, NULL, 'Product Development', 'product-development', NULL, 0, NULL, '2025-11-14 20:51:32', '2025-11-14 20:51:32'),
(18, NULL, NULL, 'Technology', 'tech', NULL, 0, NULL, '2025-11-14 21:09:47', '2025-11-14 21:09:47'),
(19, NULL, NULL, 'Tips & Best Practices', 'tips-and-practices', NULL, 0, NULL, '2025-11-14 21:18:33', '2025-11-14 21:18:33');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `assigned_to` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `message`, `source`, `status`, `assigned_to`, `created_at`, `updated_at`) VALUES
(1, 'John Smith - Acme Corporation', 'procurement@acmecorp.com', '+1 (555) 123-4567', 'We\'re interested in your warehouse management solution for our 3 distribution centers. Looking for a demo and pricing information.', 'website', 'new', 1, '2025-11-06 19:29:57', '2025-11-06 19:29:57'),
(2, 'Sarah Martinez - Tech Startup Inc', 'smartinez@techstartup.io', '+1 (555) 234-5678', 'We need a shipping solution that integrates with Shopify. Our monthly volume is around 500 orders. Can you help?', 'referral', 'contacted', 1, '2025-11-06 19:29:58', '2025-11-06 19:29:58'),
(3, 'Michael Chen - Global Retail Solutions', 'mchen@globalretail.com', '+1 (555) 345-6789', 'Requesting information about your international shipping capabilities. We ship to 50+ countries monthly.', 'website', 'qualified', 1, '2025-11-06 19:29:59', '2025-11-06 19:29:59'),
(4, 'Jennifer Thompson - E-commerce Essentials', 'j.thompson@ecommerce.net', '+1 (555) 456-7890', 'Looking to switch from our current provider. Need better rates and tracking. Can we schedule a call?', 'google', 'negotiation', 1, '2025-11-06 19:30:00', '2025-11-06 19:30:00'),
(5, 'David Wilson - Wilson Manufacturing', 'dwilson@manufacturing.com', '+1 (555) 567-8901', 'We manufacture industrial equipment and need freight management for LTL and FTL shipments. Enterprise pricing?', 'linkedin', 'converted', 1, '2025-11-06 19:30:01', '2025-11-06 19:30:01'),
(6, 'Emily Rodriguez - Fashion Forward LLC', 'erodriguez@fashion.com', '+1 (555) 678-9012', 'Hi! We\'re a fashion brand looking for a logistics partner for our peak season. Need return management too.', 'website', 'new', 1, '2025-11-06 19:30:02', '2025-11-06 19:30:02'),
(7, 'Robert Anderson - Electronics Depot', 'randerson@electronics.io', '+1 (555) 789-0123', 'We need a solution that handles high-value electronics with insurance. Volume: 2000+ orders/month.', 'referral', 'contacted', 1, '2025-11-06 19:30:03', '2025-11-06 19:30:03'),
(8, 'Lisa Brown - Health Products Plus', 'lbrown@healthproducts.com', '+1 (555) 890-1234', 'Interested in your temperature-controlled shipping for supplements and health products. What carriers do you support?', 'website', 'qualified', 1, '2025-11-06 19:30:04', '2025-11-06 19:30:04'),
(9, 'James Taylor - Taylor Furniture Co', 'jtaylor@furniture.com', '+1 (555) 901-2345', 'We ship large furniture items and need white-glove delivery options. Do you support freight carriers?', 'google', 'lost', 1, '2025-11-06 19:30:05', '2025-11-06 19:30:05'),
(10, 'Maria Garcia - Beauty Cosmetics Inc', 'mgarcia@cosmetics.net', '+1 (555) 012-3456', 'Looking for a logistics platform that integrates with BigCommerce. Need hazmat compliance for some products.', 'facebook', 'new', 1, '2025-11-06 19:30:06', '2025-11-06 19:30:06'),
(11, 'Thomas White - Auto Parts Direct', 'twhite@autoparts.com', '+1 (555) 123-4560', 'We need same-day shipping in major metros. Do you have partnerships with local couriers?', 'website', 'contacted', 1, '2025-11-06 19:30:07', '2025-11-06 19:30:07'),
(12, 'Amanda Lee - Online Bookstore', 'alee@bookstore.com', '+1 (555) 234-5601', 'Small business looking for affordable shipping rates. Volume around 200 orders per month.', 'referral', 'qualified', 1, '2025-11-06 19:30:08', '2025-11-06 19:30:08'),
(13, 'Christopher Davis - Sporting Goods Co', 'cdavis@sporting.com', '+1 (555) 345-6012', 'Need to ship bulky items like kayaks and bikes. What are your oversized package options?', 'linkedin', 'negotiation', 1, '2025-11-06 19:30:09', '2025-11-06 19:30:09'),
(14, 'Jessica Miller - Luxury Jewelry', 'jmiller@jewelry.net', '+1 (555) 456-0123', 'We sell high-value jewelry and need secure shipping with signature confirmation. Can you accommodate?', 'website', 'converted', 1, '2025-11-06 19:30:10', '2025-11-06 19:30:10'),
(15, 'Daniel Johnson - Tech Gadgets', 'djohnson@gadgets.io', '+1 (555) 567-0124', 'Interested in API integration for automated label printing. Do you have developer documentation?', 'google', 'new', 1, '2025-11-06 19:30:11', '2025-11-06 19:30:11'),
(16, 'Michelle Brown - Organic Foods Market', 'mbrown@organicfood.com', '+1 (555) 678-0125', 'We ship perishable foods and need refrigerated shipping options. What\'s your cold chain solution?', 'referral', 'contacted', 1, '2025-11-06 19:30:12', '2025-11-06 19:30:12'),
(17, 'Kevin Martinez - Home Goods Plus', 'kmartinez@homegoods.com', '+1 (555) 789-0126', 'Looking for multi-warehouse support. We have 5 fulfillment centers across the US.', 'website', 'qualified', 1, '2025-11-06 19:30:13', '2025-11-06 19:30:13'),
(18, 'Rachel Wilson - Pet Supplies Online', 'rwilson@petstore.com', '+1 (555) 890-0127', 'Need a shipping solution for pet supplies including live fish. Do you handle special requirements?', 'facebook', 'lost', 1, '2025-11-06 19:30:14', '2025-11-06 19:30:14'),
(19, 'Brian Taylor - Print Shop Pro', 'btaylor@printing.net', '+1 (555) 901-0128', 'We print custom products on-demand. Need real-time rate shopping at checkout. Is this possible?', 'linkedin', 'negotiation', 1, '2025-11-06 19:30:15', '2025-11-06 19:30:15'),
(20, 'Nicole Garcia - Art Gallery Online', 'ngarcia@artgallery.com', '+1 (555) 012-0129', 'We ship artwork and need special handling for fragile items. What packaging services do you offer?', 'website', 'new', 1, '2025-11-06 19:30:16', '2025-11-06 19:30:16'),
(21, 'Andrew Clark - Toy Store Central', 'aclark@toys.com', '+1 (555) 123-0130', 'Preparing for holiday rush. Need to scale from 500 to 5000 orders/month. Can your platform handle it?', 'referral', 'contacted', 1, '2025-11-06 19:30:17', '2025-11-06 19:30:17'),
(22, 'Stephanie Lewis - Handmade Crafts', 'slewis@crafts.io', '+1 (555) 234-0131', 'Small Etsy seller looking to upgrade shipping. Need discounted rates and batch label printing.', 'google', 'qualified', 1, '2025-11-06 19:30:18', '2025-11-06 19:30:18'),
(23, 'Mark Robinson - Industrial Supply Co', 'mrobinson@industrial.com', '+1 (555) 345-0132', 'B2B company shipping heavy industrial equipment. Need freight quotes and LTL options.', 'website', 'converted', 1, '2025-11-06 19:30:19', '2025-11-06 19:30:19'),
(24, 'Laura Martinez - Gourmet Bakery', 'lmartinez@bakery.com', '+1 (555) 456-0133', 'We ship baked goods and need next-day delivery guarantees. What are your overnight shipping rates?', 'facebook', 'new', 1, '2025-11-06 19:30:20', '2025-11-06 19:30:20'),
(25, 'Steven Anderson - Garden Supply Store', 'sanderson@garden.net', '+1 (555) 567-0134', 'Shipping live plants and seeds. Need carrier restrictions info and packaging recommendations.', 'linkedin', 'contacted', 1, '2025-11-06 19:30:21', '2025-11-06 19:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_value` decimal(8,2) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `usage_limit` int UNSIGNED DEFAULT NULL,
  `used_count` int UNSIGNED NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 'What services does your logistics platform offer?', '<p>Our platform provides comprehensive logistics solutions including freight management, warehouse operations, inventory tracking, order fulfillment, and real-time shipment visibility. We integrate with major carriers and offer both domestic and international shipping options.</p>', 'published', '2025-11-06 19:29:32', '2025-11-06 19:29:32'),
(2, 'How do I get started with your platform?', '<p>Getting started is easy! Simply sign up for an account, complete your company profile, and connect your warehouse or fulfillment center. Our onboarding team will guide you through the integration process and help you configure your first shipments within 24-48 hours.</p>', 'published', '2025-11-06 19:29:33', '2025-11-06 19:29:33'),
(3, 'What is the pricing structure?', '<p>We offer flexible pricing plans based on your shipping volume and features needed. Plans start at $49/month for small businesses and scale up to enterprise solutions. All plans include core features, with advanced analytics and premium support available on higher tiers.</p>', 'published', '2025-11-06 19:29:34', '2025-11-06 19:29:34'),
(4, 'Do you integrate with e-commerce platforms?', '<p>Yes! We integrate seamlessly with Shopify, WooCommerce, Magento, BigCommerce, and other major e-commerce platforms. Orders sync automatically, and tracking information is pushed back to your store in real-time.</p>', 'published', '2025-11-06 19:29:35', '2025-11-06 19:29:35'),
(5, 'What shipping carriers do you support?', '<p>We partner with all major carriers including FedEx, UPS, USPS, DHL, and regional carriers. You can compare rates across carriers and choose the best option for each shipment based on cost, speed, and service level.</p>', 'published', '2025-11-06 19:29:36', '2025-11-06 19:29:36'),
(6, 'Can I track my shipments in real-time?', '<p>Absolutely! Our platform provides real-time tracking for all shipments. You and your customers receive automatic updates at each milestone, including pickup, in-transit, out for delivery, and delivered notifications.</p>', 'published', '2025-11-06 19:29:37', '2025-11-06 19:29:37'),
(7, 'Do you offer international shipping?', '<p>Yes, we support international shipping to over 200 countries. Our platform handles customs documentation, duty calculations, and compliance requirements to simplify cross-border logistics.</p>', 'published', '2025-11-06 19:29:38', '2025-11-06 19:29:38'),
(8, 'What kind of customer support do you provide?', '<p>We offer 24/7 customer support via email, live chat, and phone. Our standard plans include email support, while premium plans get priority phone support and a dedicated account manager.</p>', 'published', '2025-11-06 19:29:39', '2025-11-06 19:29:39'),
(9, 'Is there a mobile app available?', '<p>Yes! Our mobile apps for iOS and Android allow you to manage shipments, track packages, scan barcodes, and receive notifications on the go. The apps are available for free download from the App Store and Google Play.</p>', 'published', '2025-11-06 19:29:40', '2025-11-06 19:29:40'),
(10, 'How secure is my data?', '<p>We take security seriously. All data is encrypted in transit and at rest using industry-standard AES-256 encryption. We\'re SOC 2 Type II certified and comply with GDPR and other data protection regulations.</p>', 'published', '2025-11-06 19:29:41', '2025-11-06 19:29:41'),
(11, 'Can I automate my shipping workflows?', '<p>Yes! Our platform offers powerful automation rules. You can set up automatic carrier selection based on weight, destination, or cost, auto-print labels, and trigger notifications. Advanced plans include custom workflow builders.</p>', 'published', '2025-11-06 19:29:42', '2025-11-06 19:29:42'),
(12, 'Do you offer warehouse management features?', '<p>Yes, our platform includes comprehensive warehouse management capabilities including inventory tracking, bin location management, cycle counting, and pick/pack/ship workflows. Perfect for 3PLs and businesses managing their own warehouses.</p>', 'published', '2025-11-06 19:29:43', '2025-11-06 19:29:43'),
(13, 'What reporting and analytics are available?', '<p>We provide detailed analytics on shipping costs, delivery performance, carrier performance, and operational metrics. Generate custom reports, export data to CSV/Excel, and visualize trends through interactive dashboards.</p>', 'published', '2025-11-06 19:29:44', '2025-11-06 19:29:44'),
(14, 'Can multiple users access the same account?', '<p>Yes, you can add unlimited team members with role-based permissions. Assign specific roles like Admin, Manager, or Warehouse Staff, each with appropriate access levels to different features and data.</p>', 'published', '2025-11-06 19:29:45', '2025-11-06 19:29:45'),
(15, 'Is there a free trial available?', '<p>Yes! We offer a 14-day free trial with full access to all features. No credit card required to start your trial. Experience the platform risk-free and see how it can transform your logistics operations.</p>', 'published', '2025-11-06 19:29:45', '2025-11-06 19:29:45'),
(16, 'What happens if a shipment is lost or damaged?', '<p>We help you file claims with carriers and provide documentation support. All shipments include basic carrier insurance, and you can purchase additional coverage for high-value items directly through our platform.</p>', 'published', '2025-11-06 19:29:46', '2025-11-06 19:29:46'),
(17, 'Can I use my own carrier accounts?', '<p>Absolutely! You can connect your existing carrier accounts to use your negotiated rates, or use our pre-negotiated rates. Many customers use a hybrid approach to get the best pricing.</p>', 'published', '2025-11-06 19:29:47', '2025-11-06 19:29:47'),
(18, 'Do you support returns management?', '<p>Yes, our platform includes complete returns management. Generate return labels, track return shipments, manage return reasons, and sync return data back to your e-commerce platform or ERP system.</p>', 'published', '2025-11-06 19:29:48', '2025-11-06 19:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `fields` json DEFAULT NULL,
  `settings` json DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `name`, `slug`, `description`, `fields`, `settings`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Contact Form', 'contact-form', 'General contact form for customer inquiries, support requests, and feedback.', '[{\"name\": \"name\", \"type\": \"text\", \"label\": \"Full Name\", \"required\": true, \"validation\": [\"required\", \"string\", \"max:255\"], \"placeholder\": \"Enter your full name\"}, {\"name\": \"email\", \"type\": \"email\", \"label\": \"Email Address\", \"required\": true, \"validation\": [\"required\", \"email\", \"max:255\"], \"placeholder\": \"your.email@example.com\"}, {\"name\": \"phone\", \"type\": \"tel\", \"label\": \"Phone Number\", \"required\": false, \"validation\": [\"nullable\", \"string\", \"max:20\"], \"placeholder\": \"+1 (555) 123-4567\"}, {\"name\": \"subject\", \"type\": \"select\", \"label\": \"Subject\", \"options\": {\"other\": \"Other\", \"sales\": \"Sales Question\", \"general\": \"General Inquiry\", \"support\": \"Technical Support\", \"feedback\": \"Feedback\"}, \"required\": true, \"validation\": [\"required\", \"string\", \"in:general,support,sales,feedback,other\"], \"placeholder\": \"Select a subject\"}, {\"name\": \"message\", \"rows\": 5, \"type\": \"textarea\", \"label\": \"Message\", \"required\": true, \"validation\": [\"required\", \"string\", \"min:10\", \"max:5000\"], \"placeholder\": \"Tell us how we can help you...\"}]', '{\"admin_email\": \"hello@example.com\", \"notify_admin\": true, \"redirect_url\": null, \"enable_captcha\": true, \"success_message\": \"Thank you for contacting us! We\'ll get back to you within 24 hours.\", \"allow_file_uploads\": false, \"submit_button_text\": \"Send Message\", \"max_submissions_per_day\": 10, \"send_confirmation_email\": true}', 'published', '2025-11-06 19:29:29', '2025-11-06 19:35:15'),
(2, 'Newsletter Subscription', 'newsletter-signup', 'Newsletter signup form for email marketing campaigns and updates.', '[{\"name\": \"email\", \"rows\": null, \"type\": \"email\", \"label\": \"Email Address\", \"options\": [], \"required\": true, \"validation\": [\"required\", \"email\", \"max:255\", \"unique:subscribers,email\"], \"placeholder\": \"Enter your email address\"}]', '{\"admin_email\": null, \"notify_admin\": false, \"redirect_url\": null, \"enable_captcha\": true, \"success_message\": \"Successfully subscribed! Please check your email to confirm your subscription.\", \"allow_file_uploads\": false, \"submit_button_text\": \"Subscribe\", \"max_submissions_per_day\": null, \"send_confirmation_email\": true}', 'published', '2025-11-06 19:29:30', '2025-11-10 23:05:49'),
(3, 'Request Demo', 'demo-request', 'Demo request form for potential customers to schedule product demonstrations.', '[{\"name\": \"first_name\", \"type\": \"text\", \"label\": \"First Name\", \"required\": true, \"validation\": [\"required\", \"string\", \"max:100\"], \"placeholder\": \"John\"}, {\"name\": \"last_name\", \"type\": \"text\", \"label\": \"Last Name\", \"required\": true, \"validation\": [\"required\", \"string\", \"max:100\"], \"placeholder\": \"Doe\"}, {\"name\": \"email\", \"type\": \"email\", \"label\": \"Work Email\", \"required\": true, \"validation\": [\"required\", \"email\", \"max:255\"], \"placeholder\": \"john.doe@company.com\"}, {\"name\": \"phone\", \"type\": \"tel\", \"label\": \"Phone Number\", \"required\": true, \"validation\": [\"required\", \"string\", \"max:20\"], \"placeholder\": \"+1 (555) 123-4567\"}, {\"name\": \"company\", \"type\": \"text\", \"label\": \"Company Name\", \"required\": true, \"validation\": [\"required\", \"string\", \"max:255\"], \"placeholder\": \"Your Company Inc.\"}, {\"name\": \"company_size\", \"type\": \"select\", \"label\": \"Company Size\", \"options\": {\"1-10\": \"1-10 employees\", \"1000+\": \"1,000+ employees\", \"11-50\": \"11-50 employees\", \"51-200\": \"51-200 employees\", \"201-500\": \"201-500 employees\", \"501-1000\": \"501-1,000 employees\"}, \"required\": true, \"validation\": [\"required\", \"string\"], \"placeholder\": \"Select company size\"}, {\"name\": \"job_title\", \"type\": \"text\", \"label\": \"Job Title\", \"required\": false, \"validation\": [\"nullable\", \"string\", \"max:255\"], \"placeholder\": \"e.g., CEO, CTO, Product Manager\"}, {\"name\": \"industry\", \"type\": \"select\", \"label\": \"Industry\", \"options\": {\"other\": \"Other\", \"retail\": \"Retail\", \"finance\": \"Finance\", \"education\": \"Education\", \"logistics\": \"Logistics & Transportation\", \"healthcare\": \"Healthcare\", \"technology\": \"Technology\", \"manufacturing\": \"Manufacturing\"}, \"required\": false, \"validation\": [\"nullable\", \"string\"], \"placeholder\": \"Select your industry\"}, {\"name\": \"preferred_date\", \"type\": \"date\", \"label\": \"Preferred Demo Date\", \"required\": false, \"validation\": [\"nullable\", \"date\", \"after:today\"], \"placeholder\": \"Select a date\"}, {\"name\": \"preferred_time\", \"type\": \"select\", \"label\": \"Preferred Time\", \"options\": {\"evening\": \"Evening (4 PM - 6 PM)\", \"morning\": \"Morning (9 AM - 12 PM)\", \"afternoon\": \"Afternoon (12 PM - 4 PM)\"}, \"required\": false, \"validation\": [\"nullable\", \"string\"], \"placeholder\": \"Select preferred time\"}, {\"name\": \"message\", \"rows\": 4, \"type\": \"textarea\", \"label\": \"Additional Information\", \"required\": false, \"validation\": [\"nullable\", \"string\", \"max:2000\"], \"placeholder\": \"Tell us about your requirements or any specific features you\'re interested in...\"}]', '{\"priority\": \"high\", \"admin_email\": \"hello@example.com\", \"notify_admin\": true, \"redirect_url\": \"/thank-you\", \"enable_captcha\": true, \"success_message\": \"Thank you for your interest! Our team will contact you within 1 business day to schedule your demo.\", \"allow_file_uploads\": false, \"submit_button_text\": \"Request Demo\", \"max_submissions_per_day\": 5, \"send_confirmation_email\": true}', 'published', '2025-11-06 19:29:31', '2025-11-06 19:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `form_submissions`
--

CREATE TABLE `form_submissions` (
  `id` bigint UNSIGNED NOT NULL,
  `form_id` bigint UNSIGNED NOT NULL,
  `data` json NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_submissions`
--

INSERT INTO `form_submissions` (`id`, `form_id`, `data`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(1, 3, '{\"email\": \"test@gmail.com\", \"phone\": \"0123456789\", \"company\": \"MS\", \"message\": \"exce\", \"industry\": \"Technology\", \"job_title\": \"CEO\", \"last_name\": \"One\", \"first_name\": \"test\", \"company_size\": \"13\", \"preferred_date\": \"2025-11-13\", \"preferred_time\": \"10am\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-11 14:54:21', '2025-11-11 14:54:21'),
(2, 3, '{\"email\": \"testtest@gmail.com\", \"phone\": \"200000000\", \"company\": \"MS\", \"message\": \"nice\", \"industry\": \"Technology\", \"job_title\": \"CEO\", \"last_name\": \"One\", \"first_name\": \"test\", \"company_size\": \"13\", \"preferred_date\": \"2025-11-13\", \"preferred_time\": \"10am\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-11 15:00:00', '2025-11-11 15:00:00'),
(3, 3, '{\"email\": \"testr@gmail.com\", \"phone\": \"200000000\", \"company\": \"MS\", \"message\": \"great\", \"industry\": \"Technology\", \"job_title\": \"CEO\", \"last_name\": \"three\", \"first_name\": \"test3\", \"company_size\": \"13\", \"preferred_date\": \"2025-11-13\", \"preferred_time\": \"10am\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-11 15:22:34', '2025-11-11 15:22:34'),
(4, 1, '{\"name\": \"test\", \"email\": \"test@gmail.com\", \"phone\": \"200000000\", \"message\": \"great sales\", \"subject\": \"sales\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-11 15:42:52', '2025-11-11 15:42:52'),
(5, 1, '{\"name\": \"test\", \"email\": \"test@gmail.com\", \"phone\": \"0123456789\", \"message\": \"great nice\", \"subject\": \"other\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-11 15:44:55', '2025-11-11 15:44:55'),
(6, 1, '{\"name\": \"test\", \"email\": \"test@gmail.com\", \"phone\": \"200000000\", \"message\": \"great From setup to delivery, we make logistics simple, smart, and efficient. Get started in minutes and manage your entire operation with ease.\", \"subject\": \"other\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-11 16:00:57', '2025-11-11 16:00:57'),
(7, 2, '{\"email\": \"test@gmail.com\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-11 17:10:40', '2025-11-11 17:10:40'),
(8, 2, '{\"email\": \"test@gmail.com\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-11 17:13:04', '2025-11-11 17:13:04'),
(9, 2, '{\"email\": \"test@gmail.com\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-11 17:15:08', '2025-11-11 17:15:08'),
(10, 2, '{\"email\": \"brandsafric@gmail.com\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-12 04:24:45', '2025-11-12 04:24:45'),
(11, 3, '{\"email\": \"brandsafric@gmail.com\", \"phone\": \"+233557186694\", \"company\": \"testing\", \"message\": \"tesiting\", \"industry\": \"tech\", \"job_title\": \"CEO\", \"last_name\": \"Korsinah\", \"first_name\": \"Daniel\", \"company_size\": \"10\", \"preferred_date\": \"2025-11-28\", \"preferred_time\": \"10:00\"}', '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2025-11-12 04:26:25', '2025-11-12 04:26:25'),
(12, 2, '{\"email\": \"test@gmail.com\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-13 14:38:40', '2025-11-13 14:38:40'),
(13, 3, '{\"email\": \"test@gmail.com\", \"phone\": \"200000000\", \"company\": \"MS\", \"message\": \"service\", \"industry\": \"Technology\", \"job_title\": \"CEO\", \"last_name\": \"One\", \"first_name\": \"test\", \"company_size\": \"13\", \"preferred_date\": \"2025-11-14\", \"preferred_time\": \"10am\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-13 14:39:30', '2025-11-13 14:39:30'),
(14, 1, '{\"name\": \"test\", \"email\": \"test@gmail.com\", \"phone\": \"200000000\", \"message\": \"nice By submitting your information, you agree to Logistic Journey’s Terms of Service and Privacy Policy. You can opt out anytime.\", \"subject\": \"other\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-13 14:40:27', '2025-11-13 14:40:27'),
(15, 2, '{\"email\": \"test@gmail.com\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-13 14:55:03', '2025-11-13 14:55:03'),
(16, 3, '{\"email\": \"test@gmail.com\", \"phone\": \"200000000\", \"company\": \"MS\", \"message\": null, \"industry\": \"Technology\", \"job_title\": \"CEO\", \"last_name\": \"One\", \"first_name\": \"test\", \"company_size\": \"13\", \"preferred_date\": \"2025-11-16\", \"preferred_time\": \"10am\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-13 14:58:29', '2025-11-13 14:58:29'),
(17, 1, '{\"name\": \"test\", \"email\": \"test@gmail.com\", \"phone\": \"200000000\", \"message\": \"By submitting your information, you agree to Logistic Journey’s Terms of Service and Privacy Policy. You can opt out anytime.\\n\\nSubmit\", \"subject\": \"other\"}', '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-13 14:59:25', '2025-11-13 14:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_14_224727_create_authors_table', 1),
(5, '2025_10_14_224735_create_categories_table', 1),
(6, '2025_10_14_224747_create_posts_table', 1),
(7, '2025_10_24_150557_create_blocks_table', 1),
(8, '2025_10_24_152051_create_pages_table', 1),
(9, '2025_10_24_152126_create_faqs_table', 1),
(10, '2025_10_24_152146_create_reviews_table', 1),
(11, '2025_10_26_000001_create_post_category_table', 1),
(12, '2025_10_26_064441_create_policies_table', 1),
(13, '2025_10_26_064521_create_forms_table', 1),
(14, '2025_10_26_081305_create_form_submissions_table', 1),
(15, '2025_10_26_081346_create_contacts_table', 1),
(16, '2025_10_26_082324_create_subscribers_table', 1),
(17, '2025_10_27_042615_create_plans_table', 1),
(18, '2025_10_27_042648_create_promotions_table', 1),
(19, '2025_10_27_042712_create_plan_features_table', 1),
(20, '2025_10_27_042730_create_coupons_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `meta` json DEFAULT NULL,
  `blocks` json DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `parent_id`, `title`, `slug`, `type`, `content`, `meta`, `blocks`, `meta_title`, `meta_description`, `status`, `created_at`, `updated_at`) VALUES
(2, NULL, 'About Us', 'about-us', NULL, '<p></p>', NULL, '[{\"data\": {\"image\": null, \"headline\": \"Everyday, millions of deliveries are set in motion. Each one is a promise\", \"image_alt\": null, \"subheadline\": \"\\\"We\'ll get it to you\\\"\"}, \"type\": \"Banner\"}, {\"data\": {\"image\": null, \"heading\": \"Our Story\", \"image_alt\": null, \"paragraphs\": [{\"text\": \"Somewhere between the depot and the doorstep, that promise often breaks. Routes twist. Communication scatters. The paper trail goes missing. Customers wait. Teams scramble. The story ends… not the way anyone hoped.\"}, {\"text\": \"We saw this happening again and again. Not because people didn’t care — but because the systems they were given weren’t built for a world that changes by the hour. \\nSo we built Logistic Journey.\"}, {\"text\": \"Not just a tool, but a new way of seeing logistics. A way that gives teams the clarity, control, and connection they need to keep their promises.\"}], \"subheading\": \"Logistic Journey\"}, \"type\": \"OurStory\"}, {\"data\": {\"features\": [{\"icon\": null, \"title\": \"Routes that think\", \"description\": \"Optimised journeys that cut waste and get it right the first time.\"}, {\"icon\": null, \"title\": \"Eyes everywhere\", \"description\": \"Real-time visibility from depot to destination. No more guessing.\"}, {\"icon\": null, \"title\": \"Proof in the palm\", \"description\": \"Digital PODs captured instantly, so the story doesn’t get lost in the shuffle.\"}, {\"icon\": null, \"title\": \"Data that speaks\", \"description\": \"Insights and analytics that help you make tomorrow smarter than today.\"}], \"headline\": \"So we built Logistics Journey\", \"background_color\": \"light\"}, \"type\": \"Features\"}, {\"data\": {\"image\": null, \"intro\": \"But here is the truth:\", \"headline\": \"Technology alone doesn\'t change an industry. People do!\", \"image_alt\": null, \"paragraphs\": [{\"text\": \"That’s why, at Logistic Journey, we don’t show up as “software providers.” We show up as collaborators, guides, and thought partners for teams who want to deliver better — not just once, but every time.\"}, {\"text\": \"We believe logistics shouldn’t feel like firefighting. It should feel like flow. And we believe the people who get there first aren’t the ones with the biggest budgets… They’re the ones who decide to lead.\"}, {\"text\": \"👉 That’s what we do, every day — alongside businesses who are ready to lead.\"}], \"quote_text\": null, \"quote_emoji\": \"💡\"}, \"type\": \"Mission\"}, {\"data\": {\"members\": [{\"link\": null, \"name\": \"Dr. Martin Mensah,\", \"image\": null, \"title\": \"CEO, Africa Region\"}, {\"link\": null, \"name\": \"Mr Osei Cole\", \"image\": null, \"title\": \"CEO, Africa Region\"}], \"headline\": \"Introduce the Team\"}, \"type\": \"Team\"}, {\"data\": {\"image\": null, \"headline\": \"Stop firefighting. Start delivering with confidence.\", \"button_text\": \"Book a Demo Now\"}, \"type\": \"Cta\"}, {\"data\": {\"image\": null, \"headline\": \"Ready to Transform Your Deliveries?\", \"image_alt\": null, \"button_primary_text\": \"Book a Demo\", \"button_secondary_text\": \"Talk to Our Team\"}, \"type\": \"DualCta\"}]', NULL, NULL, 'published', '2025-11-10 22:47:54', '2025-11-10 22:47:54'),
(3, NULL, 'Request a Demo', 'demo-request', NULL, '<p></p>', NULL, '[{\"data\": {\"email\": \"support@logisticjourney.co\", \"phone\": \"+27 11 568 7109\", \"title\": \"Request a Demo\", \"address\": \"The Workshop, Unit 7\\n70 Seventh Avenue\\nParktown North, Johannesburg\\nGauteng, South Africa\", \"subtitle\": \"Get a personal walkthrough of Logistic Journey with one of our product experts\", \"social_links\": [{\"url\": \"https://facebook.com/logisticjourney\", \"type\": \"facebook\"}, {\"url\": \"https://linkedin.com/company/logisticjourney\", \"type\": \"linkedin\"}, {\"url\": \"https://youtube.com/logisticjourney\", \"type\": \"youtube\"}, {\"url\": \"https://instagram.com/logisticjourney\", \"type\": \"instagram\"}], \"show_background\": true}, \"type\": \"ContactsInfo\"}, {\"data\": {\"headline\": \"Not ready for demo? Get access to free account\", \"button_text\": \"support@logisticjourney.com\", \"subheadline\": \"Email the team at support@logisticjourney.com to get access to Logistics Journey\"}, \"type\": \"FreeAccess\"}]', NULL, NULL, 'published', '2025-11-11 23:10:58', '2025-11-11 23:10:58'),
(4, NULL, 'Contact Us ', 'contact-us', NULL, '<p></p>', NULL, '[{\"data\": {\"items\": [{\"link\": \"+27 11 568 7109\", \"type\": \"phone\", \"title\": \"Phone Support\", \"content\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in ero.\"}, {\"link\": \"support@logisticjourney.com\", \"type\": \"email\", \"title\": \"Email Support\", \"content\": \"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in ero.\"}, {\"link\": null, \"type\": \"address\", \"title\": \"Physical Address\", \"content\": \"The Workshop, Unit 7\\n70 Seventh Avenue\\nParktown North, Johannesburg\\nGauteng, South Africa\"}], \"section_title\": \"Support\", \"section_subtitle\": \"Need help? Our support team is available to assist you.\"}, \"type\": \"Support\"}, {\"data\": {\"faqs\": [{\"answer\": \"<p>Last-mile delivery is the final step of the logistics process — when goods move from a warehouse, depot, or hub to the customer’s final destination.  It’s called the last mile because it’s the last (and often most complex) part of the delivery chain. This stage directly impacts customer satisfaction, delivery costs, and brand reputation — which is why optimising it is so critical.</p>\", \"question\": \"What is last-mile delivery?\"}, {\"answer\": \"<p>Last-mile delivery is the final step of the logistics process — when goods move from a warehouse, depot, or hub to the customer’s final destination.  It’s called the last mile because it’s the last (and often most complex) part of the delivery chain. This stage directly impacts customer satisfaction, delivery costs, and brand reputation — which is why optimising it is so critical.</p>\", \"question\": \"Why is last-mile delivery so expensive in South Africa?\"}, {\"answer\": \"<p>Last-mile delivery is the final step of the logistics process — when goods move from a warehouse, depot, or hub to the customer’s final destination.  It’s called the last mile because it’s the last (and often most complex) part of the delivery chain. This stage directly impacts customer satisfaction, delivery costs, and brand reputation — which is why optimising it is so critical.</p>\", \"question\": \"How can logistics companies reduce last-mile delivery costs?\"}, {\"answer\": \"<p>Last-mile delivery is the final step of the logistics process — when goods move from a warehouse, depot, or hub to the customer’s final destination.  It’s called the last mile because it’s the last (and often most complex) part of the delivery chain. This stage directly impacts customer satisfaction, delivery costs, and brand reputation — which is why optimising it is so critical.</p>\", \"question\": \"What are the biggest challenges in last-mile delivery in South Africa?\"}, {\"answer\": \"<p>Last-mile delivery is the final step of the logistics process — when goods move from a warehouse, depot, or hub to the customer’s final destination.  It’s called the last mile because it’s the last (and often most complex) part of the delivery chain. This stage directly impacts customer satisfaction, delivery costs, and brand reputation — which is why optimising it is so critical.</p>\", \"question\": \"What does real-time delivery tracking mean?\"}], \"title\": \"Frequently Asked Questions \"}, \"type\": \"Faqs\"}, {\"data\": {\"image\": null, \"headline\": \"Ready to Transform Your Deliveries?\", \"image_alt\": null, \"button_primary_text\": \"Book a Demo\", \"button_secondary_text\": \"Talk to Our Team\"}, \"type\": \"DualCta\"}]', NULL, NULL, 'published', '2025-11-11 23:25:49', '2025-11-11 23:25:49'),
(7, NULL, 'Features Page', 'features', NULL, '<p></p>', NULL, '[{\"data\": {\"title\": \"Features\", \"headline\": \"Smarter Routes. Happier Clients. Lower Costs!\", \"subheadline\": \"Logistic Journey gives you real-time tracking, smart route planning, and advanced reporting – so you save money and deliver on time, every time.\", \"button_primary_text\": \"Book a Demo\", \"button_secondary_text\": \"Talk to Our Team\"}, \"type\": \"Hero\"}, {\"data\": {\"features\": [{\"title\": \"Real-Time Vehicle Tracking\", \"description\": \"Monitor every vehicle’s location, route, and status live.\"}, {\"title\": \"Smart Route Optimization\", \"description\": \"Cut wasted fuel and time with AI-driven route planning.\"}, {\"title\": \"Delivery Performance Insights\", \"description\": \"Track on-time rates, delays, and customer satisfaction metrics.\"}, {\"title\": \"Driver & Fleet Analytics\", \"description\": \"Measure driver productivity, vehicle health, and operational costs.\"}], \"headline\": \"A Dashboard That Powers Your Fleet\", \"map_image\": null, \"description\": \"Get full visibility of your logistics operations in one place. Logistic Journey\'s dashboard helps you track vehicles, drivers, and deliveries in real-time – so you can reduce costs, prevent delays, and deliver on time, every time.\"}, \"type\": \"Dashboard\"}, {\"data\": {\"image\": null, \"features\": [{\"title\": \"Customizable Journey Setup\", \"description\": \"Define routes, assign drivers, and set delivery dates with just a few clicks.\"}, {\"title\": \"Order Integration\", \"description\": \"Import and manage orders directly within each journey.\"}, {\"title\": \"Cost Tracking\", \"description\": \"Automatically calculate delivery, fuel, and extra costs for better budget control.\"}, {\"title\": \"Driver & Vehicle Assignment\", \"description\": \"Ensure the right driver and vehicle are matched for each job.\"}], \"headline\": \"Plan Every Journey With Ease\", \"description\": \"Simplify complex logistics planning. With Logistic Journey, you can create, assign, and track delivery routes in minutes — reducing dispatcher stress and keeping drivers on schedule.\"}, \"type\": \"Journey\"}, {\"data\": {\"image\": null, \"headline\": \"Stop firefighting. Start delivering with confidence.\", \"button_text\": \"Book a Demo Now\"}, \"type\": \"Delivery\"}, {\"data\": {\"image\": null, \"features\": [{\"title\": \"Smart Scheduling\", \"description\": \"Drivers see upcoming and in-progress journeys right from their dashboard.\"}, {\"title\": \"Route Guidance\", \"description\": \"Clear start and destination details with integrated maps for easy navigation.\"}, {\"title\": \"Real-time Updates\", \"description\": \"Orders and delivery stops displayed directly on an interactive map.\"}, {\"title\": \"Seamless Coordination\", \"description\": \"Journey details, payloads, and progress all accessible in one place.\"}], \"headline\": \"Empower Drivers On the Go\", \"description\": \"With the Logistic Journey mobile app, drivers stay connected, informed, and efficient — every step of the way.\"}, \"type\": \"DriverApp\"}, {\"data\": {\"faqs\": [{\"answer\": \"<p>Last-mile delivery is the final step of the logistics process — when goods move from a warehouse, depot, or hub to the customer’s final destination.  It’s called the last mile because it’s the last (and often most complex) part of the delivery chain. This stage directly impacts customer satisfaction, delivery costs, and brand reputation — which is why optimising it is so critical.</p>\", \"question\": \"What is last-mile delivery?\"}, {\"answer\": \"<p>Last-mile delivery is the final step of the logistics process — when goods move from a warehouse, depot, or hub to the customer’s final destination.  It’s called the last mile because it’s the last (and often most complex) part of the delivery chain. This stage directly impacts customer satisfaction, delivery costs, and brand reputation — which is why optimising it is so critical.</p>\", \"question\": \"Why is last-mile delivery so expensive in South Africa?\"}, {\"answer\": \"<p>Last-mile delivery is the final step of the logistics process — when goods move from a warehouse, depot, or hub to the customer’s final destination.  It’s called the last mile because it’s the last (and often most complex) part of the delivery chain. This stage directly impacts customer satisfaction, delivery costs, and brand reputation — which is why optimising it is so critical.</p>\", \"question\": \"How can logistics companies reduce last-mile delivery costs?\"}, {\"answer\": \"<p>Last-mile delivery is the final step of the logistics process — when goods move from a warehouse, depot, or hub to the customer’s final destination.  It’s called the last mile because it’s the last (and often most complex) part of the delivery chain. This stage directly impacts customer satisfaction, delivery costs, and brand reputation — which is why optimising it is so critical.</p>\", \"question\": \"What are the biggest challenges in last-mile delivery in South Africa?\"}, {\"answer\": \"<p>Last-mile delivery is the final step of the logistics process — when goods move from a warehouse, depot, or hub to the customer’s final destination.  It’s called the last mile because it’s the last (and often most complex) part of the delivery chain. This stage directly impacts customer satisfaction, delivery costs, and brand reputation — which is why optimising it is so critical.</p>\", \"question\": \"What does real-time delivery tracking mean?\"}], \"title\": \"Here are answers to the most common questions about Logistic Journey and how it can support your logistics operations.\"}, \"type\": \"Faqs\"}, {\"data\": {\"image\": null, \"headline\": \"Ready to Transform Your Deliveries?\", \"image_alt\": null, \"button_primary_text\": \"Book a Demo\", \"button_secondary_text\": \"Talk to Our Team\"}, \"type\": \"DualCta\"}]', NULL, NULL, 'published', '2025-11-12 13:01:03', '2025-11-12 13:04:25'),
(8, NULL, 'Home Page', 'home', NULL, '<p></p>', NULL, '[{\"data\": {\"headline\": \"Smarter Deliveries.\\nHappier Customers.\", \"show_stats\": true, \"subheadline\": \"Logistic Journey gives you full control, real-time visibility, and reliable deliveries–without the chaos of paper and spreadsheets.\", \"show_buttons\": true, \"stat_1_label\": \"Tue\", \"stat_1_value\": \"20\", \"stat_2_label\": \"Orders\", \"stat_2_value\": \"12 Packages\", \"stat_3_label\": \"Time Used\", \"stat_3_value\": \"56 min\", \"stat_4_label\": \"Success Rate\", \"stat_4_value\": \"83%\", \"highlight_text\": \"Lower Costs!\", \"background_image\": null, \"primary_button_text\": \"Book a Demo\", \"secondary_button_text\": \"Talk to Our Team\"}, \"type\": \"Hero\"}, {\"data\": {\"title\": \"The Problem with Deliveries Today\", \"side_image\": null, \"description\": \"Without real-time visibility, your fleet becomes a silent money drain.\\nHere\'s what it\'s costing you today\", \"problem_1_title\": \"Failed Deliveries\", \"problem_2_title\": \"Lack of Visibility\", \"problem_3_title\": \"Manual Chaos\", \"problem_4_title\": \"Fuel Cost\", \"problem_1_description\": \"Wasted trips and unhappy customers\", \"problem_2_description\": \"Blind once drivers leave depot\", \"problem_3_description\": \"Paper, Excel and errors everywhere\", \"problem_4_description\": \"Inefficient routes burn 20-30% more fuel.\"}, \"type\": \"Problem\"}, {\"data\": {\"title\": \"The Logistic Journey Solution\", \"subtitle\": \"From failed deliveries to full control — here\'s how we help teams move smarter.\", \"card_1_title\": \"Route optimisation, customer ETA\'s, instant proof of delivery\", \"card_2_title\": \"Live tracking, digital trip sheets, real-time reporting\", \"card_3_title\": \"Digital orders, automated planning, instant PODs, analytics\", \"card_1_description\": \"More first time success, fewer wasted trips\", \"card_2_description\": \"Complete visibility from depot to destination\", \"card_3_description\": \"Fewer errors, faster decisions, efficient operations\"}, \"type\": \"Solution\"}, {\"data\": {\"title\": \"Why Choose Logistic Journey\", \"description\": \"Discover how Logistic Journey can help optimize your fleet management and improve business operations.\", \"feature_image\": null, \"benefit_1_title\": \"Reduce wasted trips and costs\", \"benefit_2_title\": \"Delight Customers with reliable service\", \"benefit_3_title\": \"Give managers real time control\", \"benefit_4_title\": \"Replace chaos with streamlined workflow\"}, \"type\": \"WhyChoose\"}, {\"data\": {\"headline\": \"Stop firefighting.\\nStart delivering with \\nconfidence.\", \"button_text\": \"Book a Demo Now\", \"mobile_image\": null}, \"type\": \"CTAHomepage\"}, {\"data\": {\"tag\": \"Features\", \"title\": \"All the Tools You Need, in One Platform.\", \"description\": \"Logistic Journey is designed to streamline logistics operations, enhance efficiency, and provide real-time visibility into fleet movements.\", \"feature_1_title\": \"Fleet Management\", \"feature_2_title\": \"Order Creation\", \"feature_3_title\": \"Live Tracking\", \"feature_4_title\": \"Driver Management\", \"feature_5_title\": \"Advanced Reporting\", \"feature_6_title\": \"Optimised Route Pla...\", \"feature_7_title\": \"Vehicle Replay\", \"feature_1_description\": \"Keep track of all your vehicles, monitor their conditions, and schedule maintenance to prevent breakdowns.\", \"feature_2_description\": \"Create and manage transportation requests with ease, ensuring efficient deliveries.\", \"feature_3_description\": \"Get real-time updates on vehicle locations, estimated arrival times, and route efficiency.\", \"feature_4_description\": \"Assign drivers, track their performance, and ensure compliance with safety regulations.\", \"feature_5_description\": \"Generate detailed reports on fleet usage, driver performance, and operational efficiency.\", \"feature_6_description\": \"Plan the most efficient routes to reduce travel time and costs.\", \"feature_7_description\": \"Review past journeys to analyze and improve fleet performance.\"}, \"type\": \"FeaturesTools\"}, {\"data\": {\"tag\": \"How it works\", \"title\": \"How To Get Started With Logistics Journey\", \"side_image\": null, \"description\": \"From setup to delivery, we make logistics simple, smart, and efficient. Get started in minutes and manage your entire operation with ease.\", \"step_1_title\": \"Contact\", \"step_2_title\": \"Access\", \"step_3_title\": \"Setup\", \"step_4_title\": \"Orders\", \"step_5_title\": \"Delivery\", \"step_1_description\": \"Send us an email to show your interest.\", \"step_2_description\": \"Gain access to your Logistic Journey account and dashboard.\", \"step_3_description\": \"Configure your fleet and team preferences to match your operations.\", \"step_4_description\": \"Start creating and managing delivery orders in the system.\", \"step_5_description\": \"Track deliveries in real-time and optimize your operations.\"}, \"type\": \"GetStarted\"}, {\"data\": {\"faqs\": [{\"answer\": \"<p>Last-mile delivery is the final step of the logistics process — when goods move from a warehouse, depot, or hub to the customer’s final destination.  It’s called the last mile because it’s the last (and often most complex) part of the delivery chain. This stage directly impacts customer satisfaction, delivery costs, and brand reputation — which is why optimising it is so critical.</p>\", \"question\": \"What is last-mile delivery?\"}, {\"answer\": \"<p>Last-mile delivery is the final step of the logistics process — when goods move from a warehouse, depot, or hub to the customer’s final destination.  It’s called the last mile because it’s the last (and often most complex) part of the delivery chain. This stage directly impacts customer satisfaction, delivery costs, and brand reputation — which is why optimising it is so critical.</p>\", \"question\": \"Why is last-mile delivery so expensive in South Africa?\"}, {\"answer\": \"<p>Last-mile delivery is the final step of the logistics process — when goods move from a warehouse, depot, or hub to the customer’s final destination.  It’s called the last mile because it’s the last (and often most complex) part of the delivery chain. This stage directly impacts customer satisfaction, delivery costs, and brand reputation — which is why optimising it is so critical.</p>\", \"question\": \"How can logistics companies reduce last-mile delivery costs?\"}, {\"answer\": \"<p>Last-mile delivery is the final step of the logistics process — when goods move from a warehouse, depot, or hub to the customer’s final destination.  It’s called the last mile because it’s the last (and often most complex) part of the delivery chain. This stage directly impacts customer satisfaction, delivery costs, and brand reputation — which is why optimising it is so critical.</p>\", \"question\": \"How can logistics companies reduce last-mile delivery costs?\"}, {\"answer\": \"<p>Last-mile delivery is the final step of the logistics process — when goods move from a warehouse, depot, or hub to the customer’s final destination.  It’s called the last mile because it’s the last (and often most complex) part of the delivery chain. This stage directly impacts customer satisfaction, delivery costs, and brand reputation — which is why optimising it is so critical.</p>\", \"question\": \"What does real-time delivery tracking mean?\"}], \"title\": \"Here are answers to the most common questions about Logistic Journey and how it can support your logistics operations.\"}, \"type\": \"Faqs\"}, {\"data\": {\"image\": null, \"headline\": \"Ready to Transform Your Deliveries?\", \"image_alt\": null, \"button_primary_text\": \"Book a Demo\", \"button_secondary_text\": \"Talk to Our Team\"}, \"type\": \"DualCta\"}]', NULL, NULL, 'published', '2025-11-12 22:03:45', '2025-11-12 22:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(8,2) NOT NULL,
  `billing_cycle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_features`
--

CREATE TABLE `plan_features` (
  `id` bigint UNSIGNED NOT NULL,
  `plan_id` bigint UNSIGNED NOT NULL,
  `feature_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_included` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `title`, `slug`, `content`, `meta_title`, `meta_description`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', 'privacy-policy', '<h3>Background</h3><p>At Logistic Journey, protecting your personal information is a top priority. This Privacy Policy outlines how we collect, use, and safeguard your data in accordance with South Africa&#039;s Protection of Personal Information Act (POPIA).</p><p>This policy applies to our websites and services, including:</p><ul><li><p><a target=\"_blank\" rel=\"noopener noreferrer nofollow\" href=\"https://new.logisticjourney.com/\">https://new.logisticjourney.com</a></p></li><li><p><a target=\"_blank\" rel=\"noopener noreferrer nofollow\" href=\"http://app.LogisticJourney.com\">app.LogisticJourney.com</a></p></li></ul><p>By accessing or using our services, you consent to the practices described below.</p><hr><h3>1. Information We Collect</h3><h3>Personal Information</h3><p>We may collect personal details such as:</p><ul><li><p>Name</p></li><li><p>Address</p></li><li><p>Phone number</p></li><li><p>Email address</p></li></ul><p>This information is used to facilitate logistics operations, manage accounts, and communicate with you.</p><h3>Driver Location Data</h3><p>If you use the Logistic Journey Driver App, we collect real-time location data (including background location) to:</p><ul><li><p>Track deliveries</p></li><li><p>Manage geofencing</p></li><li><p>Optimize routing</p></li></ul><p>Location data is collected <strong>only when you are marked as &quot;online&quot; or &quot;on shift&quot;</strong>. We do <strong>not</strong> collect or store location data when you are offline.</p><h3>Technical &amp; Usage Data</h3><p>We automatically collect:</p><ul><li><p>IP address</p></li><li><p>Browser type</p></li><li><p>Operating system</p></li><li><p>Access times</p></li><li><p>Referring URLs</p></li></ul><p>This data helps us improve service quality and user experience.</p><hr><h3>2. How We Use Your Information</h3><p>We use your data to:</p><ul><li><p>Operate and maintain our services</p></li><li><p>Deliver requested services</p></li><li><p>Communicate updates and offers</p></li><li><p>Conduct surveys and gather feedback</p></li></ul><p>We do not sell, rent, or lease your personal information to third parties.</p><p>We may share data with trusted service providers (e.g., analytics, support) who are contractually bound to maintain confidentiality and use data only for specified purposes.</p><hr><h3>3. Legal Disclosure</h3><p>We may disclose personal information if required to:</p><ul><li><p>Comply with legal obligations</p></li><li><p>Protect the rights or property of Logistic Journey</p></li><li><p>Ensure user or public safety in urgent circumstances</p></li></ul><hr><h3>4. Use of Cookies</h3><p>Our websites use <strong>cookies</strong> to:</p><ul><li><p>Enhance your browsing experience</p></li><li><p>Remember preferences</p></li><li><p>Improve interactions</p></li></ul><p>You can manage cookie preferences via your browser settings. Disabling cookies may affect certain functionalities.</p><hr><h3>5. Data Security</h3><p>We implement industry-standard security measures, including:</p><ul><li><p>SSL encryption</p></li><li><p>Secure data storage</p></li><li><p>Access controls</p></li></ul><p>While we strive to protect your data, no method of transmission or storage is 100% secure.</p><hr><h3>6. Children&#039;s Privacy</h3><p>We do not knowingly collect data from children under 13. If you are under 13, please use our services only with parental or guardian supervision.</p><hr><h3>7. Your Privacy Choices</h3><p>You may:</p><ul><li><p>Opt out of promotional communications via unsubscribe links or by contacting us</p></li><li><p>Request access, correction, or deletion of your personal data</p></li></ul><hr><h3>8. Changes to This Privacy Policy</h3><p>We may update this policy to reflect changes in our practices or legal obligations. Significant updates will be communicated via email or dashboard notifications.</p><hr><h3>9. Contact Us</h3><p>If you have questions or concerns about this Privacy Policy, please contact us:</p><p><strong>Email</strong>: <a target=\"_blank\" rel=\"noopener noreferrer nofollow\" href=\"mailto:info@LogisticJourney.com\"><u>info@LogisticJourney.com</u></a></p><hr><p>© 2025 Analytical Technologies. Based in South Africa. All rights reserved.</p><p><br></p>', NULL, NULL, 'published', NULL, '2025-11-06 19:29:52', '2025-11-14 21:40:38'),
(2, 'Terms and Conditions', 'terms-and-conditions', '<h1>Terms and Conditions – Logistic Journey</h1>\n<p>Terms of Service - Logistic Journey</p>\n<p>Terms of Service</p>\n<p>Back to Home</p>\n<p>Terms of Service\nThe terms and conditions stated herein (collectively, the &quot;Agreement&quot;) form a binding agreement between you\nand Anylytical Technologies (PTY) LTD (the &quot;Company&quot;). In order to use the Service and the associated\nSoftware you must agree to the terms and conditions that are set out below. By using or receiving any\nservices supplied to you by the Company (collectively, the &quot;Service&quot;), and downloading, installing or using\nany associated software supplied by the Company which purpose is to enable you to use the Service\n(collectively, the &quot;Software&quot;), you explicitly confirm your understanding and acceptance to be bound by the\nterms and conditions of the Agreement, and any future amendments and additions to this Agreement.\nThe Company reserves the right to modify the terms and conditions of this Agreement or its policies relating\nto the Service or Software at any time, effective upon posting of an updated version of this Agreement on\nthe Service or Software. You are responsible for regularly reviewing this Agreement. Continued use of the\nService or Software after any such changes shall constitute your consent to such changes.\nLOGISTICJOURNEY DOES NOT PROVIDE LOGISTICS OR COURIER SERVICES, AND LOGISTICJOURNEY IS NOT A LOGISTICS\nCARRIER. IT IS UP TO THE THIRD PARTY COURIER OR LOGISTICS PROVIDER, COURIER OR VEHICLE OPERATOR TO OFFER\nCOURIER SERVICES WHICH MAY BE SCHEDULED THROUGH USE OF THE SOFTWARE OR SERVICE. LOGISTICJOURNEY OFFERS\nINFORMATION AND A METHOD TO OBTAIN SUCH THIRD PARTY COURIER SERVICES, BUT DOES NOT AND DOES NOT INTEND TO\nPROVIDE COURIER SERVICES OR ACT IN ANY WAY AS A COURIER, AND HAS NO RESPONSIBILITY OR LIABILITY FOR ANY\nCOURIER OTHER THAN STATED HEREIN SERVICES PROVIDED TO YOU BY SUCH THIRD PARTIES.\nRepresentations and Warranties\nBy using the Software or Service, you confirm and guarantee that you are legally entitled to enter this\nAgreement. If you reside in a jurisdiction that restricts the use of the Service because of age, or\nrestricts the ability to enter into agreements such as this one due to age, you must abide by such age\nlimits and you must not use the Software and Service. Without limiting the foregoing, the Service and\nSoftware is not available to children (persons under the age of 18). By using the Software or Service, you\nrepresent and warrant that you are at least 18 years old. By using the Software or the Service, you\nrepresent and warrant that you have the right, authority and capacity to enter into this Agreement and to\nabide by the terms and conditions of this Agreement. Your participation in using the Service and/or Software\nis for your individual use only. You may not authorize others to use your user status, and you may not\nassign or otherwise transfer your user account to any other person or entity. When using the Software or\nService you agree to comply with all applicable laws from your home nation, the country, state and city in\nwhich you are present while using the Software or Service.\nYou may only access the Service using authorized means. It is your responsibility to check to ensure you\ndownload the correct Software for your device. The Company is not liable if you do not have a compatible\nhandset or if you have downloaded the wrong version of the Software for your handset. The Company reserves\nthe right to terminate this Agreement should you be using the Service or Software with an incompatible or\nunauthorized device.</p>\n<p>By using the Software or the Service, you agree that:</p>\n<p>You will only use the Service or Software for lawful purposes; you will not use the Services for sending\nor storing any unlawful material or for fraudulent purposes.</p>\n<p>You will not use the Service or Software to cause nuisance, annoyance or inconvenience.\nYou will not copy, or distribute the Software or other content unless prior written consent is obtained\nfrom the Company.</p>\n<p>You will provide us with whatever proof of identity we may reasonably request.\nYou are aware that when requesting services by SMS, standard messaging charges will apply.\nYou will keep secure and confidential your account password or any identification we provide you which\nallows access to the Service.</p>\n<p>You will only use the Software and Service for your own use and will not resell it to a third party.</p>\n<p>You will not impair the proper operation of the network.\nYou will not try to harm the Service or Software in any way whatsoever.\nYou will report any errors, bugs, unauthorized access methodologies or any breach of our intellectual\nproperty rights that you uncover in your use of the Service.</p>\n<pre><code>     \n\n    Intellectual Property Ownership\n</code></pre>\n<p>The Company alone (and its licensors, where applicable) shall retain full ownership and rights,\nincluding all related intellectual property rights, in and to the Software and the Service and any\nsuggestions, ideas, enhancement requests, feedback, recommendations or other information provided by\nyou or any other party relating to the Software or the Service. This Agreement is not a sale and\ndoes not convey to you any rights of ownership in or related to the Software or the Service, or any\nintellectual property rights owned by the Company. The Company name, the Company logo, and the\nproduct names associated with the Software and Service are trademarks of the Company or third\nparties, and no right or license is granted to use them.\nUser Account\nYou are the sole authorized User of any account you create with the Software or provided by the\ncompany. You are responsible for safeguarding the privacy of any password or account number provided\nby you or the Company for accessing the Software. You are solely and fully responsible for all\nactivities that occur under your password or account. The Company has no control over the use of any\nUser\'s account and explicitly denies any responsibility derived therefrom. Should you suspect that\nany unauthorized party may be using your password or account, you will notify the Company\nimmediately.\nThird Party Interactions\nDuring use of the Software and Service, you may enter into correspondence with, purchase goods and/or\nservices from, or participate in promotions of third party service providers, advertisers or\nsponsors showing their goods and/or services through the Software or Service. Any such activity, and\nany terms, conditions, warranties or representations associated with such activity, is solely\nbetween you and the applicable third-party. The Company and its licensors shall have no liability,\nobligation or responsibility for any such correspondence, purchase, transaction or promotion between\nyou and any such third-party. The Company does not endorse any sites on the Internet that are linked\nthrough the Service or Software, and in no event shall the Company or its licensors be responsible\nfor any content, products, services or other materials on or available from such sites or third\nparty providers. The Company provides the Software and Service to you pursuant to the terms and\nconditions of this Agreement. You recognize, however, that certain third-party providers of goods\nand/or services may require your agreement to additional or different terms and conditions prior to\nyour use of or access to such goods or services, and the Company disclaims any and all\nresponsibility or liability arising from such agreements between you and the third party\nproviders.\nThe Company may rely on third party advertising and marketing supplied through the Software or\nService and other mechanisms to subsidize the Software or Service. By agreeing to these terms and\nconditions you agree to receive such advertising and marketing. If you do not want to receive such\nadvertising you should notify us in writing. The Company reserves the right to charge you a higher\nfee for the Service or Software should you choose not to receive these advertising services. The\nCompany may compile and release information regarding you and your use of the Software or Service on\nan anonymous basis as part of a customer profile or similar report or analysis. You agree that it is\nyour responsibility to take reasonable precautions in all actions and interactions with any third\nparty you interact with through the Service.\nTransactions Involving Alcohol\nYou may have the option to order delivery of alcohol products in some locations and from certain\nretailers. By placing an order for alcohol products, you confirm that you are of legal drinking age\nin the country where the delivery is made. You also agree that, upon delivery of alcohol products,\nthe recipient will provide valid government-issued identification proving their age to the driver\ndelivering the alcohol products and that the recipient will not be intoxicated when receiving\ndelivery of such products.\nIndemnification\nYou agree to defend, indemnify and hold harmless the Company and its officers, directors, employees,\nagents and affiliates (each, an &quot;Indemnified Party&quot;), from and against any losses, claims, actions,\ncosts, damages, penalties, fines and expenses, including without limitation attorneys\' fees and\nexpenses, that may be incurred by an Indemnified Party arising out of, relating to or resulting from\nyour unauthorized use of the Software or from any breach by you of these Terms and Conditions,\nincluding without limitation any actual or alleged violation of any federal, state or local statute,\nordinance, administrative order, rule or regulation. The Company shall provide notice to you\npromptly of any such claim, suit or proceeding and shall have the right to control the defense of\nsuch action, at your expense, in defending any such claim, suit or proceeding.</p>\n<p>Disclaimer\nUSE OF THE SOFTWARE IS ENTIRELY AT YOUR OWN RISK. CHANGES ARE PERIODICALLY MADE TO THE WEBSITE AND\nMAY BE MADE AT ANY TIME WITHOUT NOTICE TO YOU. THE SOFTWARE IS PROVIDED ON AN &quot;AS IS&quot; BASIS WITHOUT\nWARRANTIES OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, WARRANTIES OF\nMERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. Logistic Journey MAKES NO\nWARRANTIES OR REPRESENTATIONS ABOUT THE ACCURACY OR COMPLETENESS OF THE CONTENT PROVIDED THROUGH THE\nSOFTWARE OR THE CONTENT OF ANY WEBSITES LINKED TO THE SERVICE. Logistic Journey ASSUMES NO LIABILITY\nOR RESPONSIBILITY FOR ANY (I) ERRORS, MISTAKES, OR INACCURACIES OF CONTENT; (II) PERSONAL INJURY OR\nPROPERTY DAMAGE, OF ANY NATURE WHATSOEVER, RESULTING FROM YOUR ACCESS TO AND USE OF THE SERVICE OR\nTHE SOFTWARE; (III) ANY UNAUTHORIZED ACCESS TO OR USE OF LOGISTICJOURNEY’S SECURE SERVERS AND/OR ANY\nAND ALL PERSONAL INFORMATION AND/OR FINANCIAL INFORMATION STORED THEREIN.\nLogistic Journey DOES NOT WARRANT THAT THE WEBSITE WILL OPERATE ERROR-FREE OR THAT THE WEBSITE AND ITS\nSERVER ARE FREE OF COMPUTER VIRUSES AND OTHER HARMFUL GOODS. IF YOUR USE OF THE WEBSITE RESULTS IN\nTHE NEED FOR SERVICING OR REPLACING EQUIPMENT OR DATA, Logistic Journey SHALL NOT BE RESPONSIBLE FOR\nTHOSE COSTS. Logistic Journey, TO THE FULLEST EXTENT PERMITTED BY LAW, DISCLAIMS ALL WARRANTIES,\nWHETHER EXPRESS OR IMPLIED, INCLUDING WITHOUT LIMITATION THE WARRANTY OF MERCHANTABILITY,\nNON-INFRINGEMENT OF THIRD PARTY RIGHTS AND THE WARRANTY OF FITNESS FOR A PARTICULAR PURPOSE.\nLogistic Journey MAKES NO WARRANTIES ABOUT THE ACCURACY, RELIABILITY, COMPLETENESS OR TIMELINESS OF\nTHE CONTENT, SERVICES, SOFTWARE, SOFTWARE, TEXT, GRAPHICS OR LINKS. Logistic Journey AND ITS\nAFFILIATES AND LICENSORS CANNOT AND DO NOT GUARANTEE THAT ANY PERSONAL INFORMATION SUPPLIED BY YOU\nWILL NOT BE MISAPPROPRIATED, INTERCEPTED, DELETED, DESTROYED OR USED BY OTHERS.\nInternet Delays\nLOGISTICJOURNEY\'S SERVICE AND SOFTWARE MAY BE SUBJECT TO LIMITATIONS, DELAYS, AND OTHER PROBLEMS\nINHERENT IN THE USE OF THE INTERNET AND ELECTRONIC COMMUNICATIONS. Logistic Journey IS NOT\nRESPONSIBLE FOR ANY DELAYS, DELIVERY FAILURES, OR OTHER DAMAGE RESULTING FROM SUCH PROBLEMS.\nLimitation of Liability\nIN NO EVENT SHALL LOGISTICJOURNEY\'S AGGREGATE LIABILITY EXCEED THE AMOUNTS ACTUALLY PAID BY AND/OR\nDUE FROM YOU IN THE SIX (6) MONTH PERIOD IMMEDIATELY PRECEDING THE EVENT GIVING RISE TO SUCH CLAIM.\nIN NO EVENT SHALL Logistic Journey AND/OR ITS LICENSORS BE LIABLE TO ANYONE FOR ANY INDIRECT,\nPUNITIVE, SPECIAL, EXEMPLARY, INCIDENTAL, CONSEQUENTIAL OR OTHER DAMAGES OF ANY TYPE OR KIND\n(INCLUDING PERSONAL INJURY, LOSS OF DATA, REVENUE, PROFITS, USE OR OTHER ECONOMIC ADVANTAGE).\nLogistic Journey AND/OR ITS LICENSORS SHALL NOT BE LIABLE FOR ANY LOSS, DAMAGE OR INJURY WHICH MAY BE\nINCURRED BY YOU, INCLUDING BY NOT LIMITED TO LOSS, DAMAGE OR INJURY ARISING OUT OF, OR IN ANY WAY\nCONNECTED WITH THE SERVICE OR SOFTWARE, INCLUDING BUT NOT LIMITED TO THE USE OR INABILITY TO USE THE\nSERVICE OR SOFTWARE, ANY RELIANCE PLACED BY YOU ON THE COMPLETENESS, ACCURACY OR EXISTENCE OF ANY\nADVERTISING, OR AS A RESULT OF ANY RELATIONSHIP OR TRANSACTION BETWEEN YOU AND ANY THIRD PARTY\nSERVICE PROVIDER, ADVERTISER OR SPONSOR WHOSE ADVERTISING APPEARS ON THE WEBSITE OR IS REFERRED BY\nTHE SERVICE OR SOFTWARE, EVEN IF Logistic Journey AND/OR ITS LICENSORS HAVE BEEN PREVIOUSLY ADVISED\nOF THE POSSIBILITY OF SUCH DAMAGES.\nLogistic Journey MAY INTRODUCE YOU TO THIRD PARTY COURIER PROVIDERS AND FOOD SERVICES FOR THE PURPOSES\nOF PROVIDING COURIER AND FOOD SERVICES. WE WILL NOT ASSESS THE SUITABILITY, LEGALITY OR ABILITY OF\nANY THIRD PARTY COURIER OR FOOD SERVICES PROVIDERS AND YOU EXPRESSLY WAIVE AND RELEASE\nLogistic Journey FROM ANY AND ALL ANY LIABILITY, CLAIMS OR DAMAGES ARISING FROM OR IN ANY WAY RELATED\nTO THE THIRD PARTY COURIER OR FOOD SERVICES PROVIDERS. Logistic Journey WILL NOT BE A PARTY TO\nDISPUTES, NEGOTIATIONS OF DISPUTES BETWEEN YOU AND SUCH THIRD PARTY PROVIDERS. WE CANNOT AND WILL\nNOT PLAY ANY ROLE IN MANAGING PAYMENTS BETWEEN YOU AND THE THIRD PARTY PROVIDERS. RESPONSIBILITY FOR\nTHE DECISIONS YOU MAKE REGARDING SERVICES OFFERED VIA THE SOFTWARE OR SERVICE (WITH ALL ITS\nIMPLICATIONS) RESTS SOLELY WITH YOU. WE WILL NOT ASSESS THE SUITABILITY, LEGALITY OR ABILITY OF ANY\nSUCH THIRD PARTIES AND YOU EXPRESSLY WAIVE AND RELEASE Logistic Journey FROM ANY AND ALL LIABILITY,\nCLAIMS, CAUSES OF ACTION, OR DAMAGES ARISING FROM YOUR USE OF THE SOFTWARE OR SERVICE, OR IN ANY WAY\nRELATED TO THE THIRD PARTIES INTRODUCED TO YOU BY THE SOFTWARE OR SERVICE. THE QUALITY OF THE FOOD\nAND COURIER SERVICES SCHEDULED THROUGH THE USE OF THE SERVICE OR SOFTWARE IS ENTIRELY THE\nRESPONSIBILITY OF THE THIRD PARTY PROVIDER WHO ULTIMATELY PROVIDES SUCH FOOD AND COURIER SERVICES TO\nYOU.YOU UNDERSTAND, THEREFORE, THAT BY USING THE SOFTWARE AND THE SERVICE, YOU MAY BE EXPOSED TO\nCOURIER AND FOOD THAT IS POTENTIALLY DANGEROUS, OFFENSIVE, HARMFUL TO MINORS, UNSAFE OR OTHERWISE\nOBJECTIONABLE, AND THAT YOU USE THE SOFTWARE AND THE SERVICE AT YOUR OWN RISK.\nDispute Resolution\nThe parties shall first attempt to resolve any dispute related to this Agreement in an amicable\nmanner by mediation with a mutually acceptable mediator. If unable to agree upon an acceptable\nmediator, either party may ask a mutually agreed upon mediation service to appoint a neutral\nmediator, and the mediation shall be conducted under the Commercial Mediation Rules of the mutually\nacceptable mediation service. Any disputes remaining unresolved after mediation shall be settled by\nbinding arbitration conducted in Johannesburg, Gauteng,South Africa utilizing a mutually agreed\narbitrator or arbitration service. The arbitration shall be conducted under the Commercial\nArbitration Rules of the mutually agreed arbitrator or arbitration service. Both parties shall be\nentitled in any arbitration to conduct reasonable discovery, including document production and a\nreasonable number of depositions not to exceed five per party. The prevailing party shall be\nentitled to recover its costs and reasonable attorney\'s fees, as determined by the arbitrator. The\narbitrator shall be required to follow the law.</p>\n<p>Termination\nAt its sole discretion, the Company may modify or discontinue the Software, or may modify, suspend or\nterminate your access to the Software or the Service, for any reason, with or without notice to you\nand without liability to you or any third party. In addition to suspending or terminating your\naccess to the Software or the Service, The Company reserves the right to take appropriate legal\naction, including without limitation pursuing civil, criminal or injunctive redress. Even after your\nright to use the Software is terminated, this Agreement will remain enforceable against you. You may\nterminate this Agreement at any time by ceasing all use of the Software. All provisions which by\ntheir nature should survive to give effect to those provisions shall survive the termination of this\nAgreement.\nGeneral\nNo joint venture, partnership, employment, or agency relationship exists between you, the Company or\nany third party provider as a result of this Agreement or use of the Service or Software. This\nAgreement is governed by the laws of the Republic ofSouth Africa, without regards to its conflict of\nlaws principles. If any provision of this Agreement is found to be invalid in any court having\ncompetent jurisdiction, the invalidity of such provision shall not affect the validity of the\nremaining provisions of this Agreement, which shall remain in full force and effect. Any offer for\nany product, feature, service or software made on this Website is void where prohibited.\nCountry of Domicile Clause\nAnylytical Technologies (Pty) Ltd is a company registered and operating in the Republic of South\nAfrica. As such, these Terms of Service and any services provided through this website are governed\nby the laws of South Africa.\nBy accessing or using our services, you acknowledge and agree that South Africa is the country of\ndomicile for Anylytical Technologies and that any legal matters arising from your use of the website\nor our services will be subject to the jurisdiction of South African courts.\nGoverning Laws and Jurisdiction\nThis Agreement shall be governed by and construed in accordance with the laws of the Republic of South Africa. By accessing or using our services, you consent to the exclusive jurisdiction of the courts of South Africa for any legal action or dispute that may arise from or relate to these Terms and Conditions, our services, or your use of the Logistic Journey platform.\nIf any provision of this Agreement is found to be invalid or unenforceable by a court of law, such provision shall be severed, and the remaining provisions shall remain in full force and effect.\nTransaction Currency\nAll transactions on the Logistic Journey platform are processed in South African Rands (ZAR). Prices displayed on the website or within the platform are quoted in ZAR, unless otherwise stated. By using our services, you acknowledge and accept that all payments and billing will be conducted in the official currency of South Africa.</p>\n<p>© 2025 Anylytical Technologies. Based in South Africa. All rights reserved.</p>\n', NULL, NULL, 'published', NULL, '2025-11-06 19:29:53', '2025-11-06 19:29:53'),
(3, 'Refund Policy', 'refund-policy', '<h1>Refund &amp; Cancellation Policy – Logistic Journey</h1>\n<p>At <strong>Logistic Journey</strong>, we are committed to providing reliable and high-quality logistics solutions. This Refund &amp; Cancellation Policy outlines the conditions under which refunds may be granted, in accordance with South African consumer protection laws.</p>\n<hr />\n<h2>1. Eligibility for Refunds</h2>\n<p>You may be eligible for a full or partial refund under the following circumstances:</p>\n<ul>\n<li><strong>Billing Errors</strong>: If you report a billing error within <strong>7 calendar days</strong> of the transaction.</li>\n<li><strong>Subscription Cancellation</strong>: If you cancel your subscription <strong>before the start of the new billing cycle</strong>.</li>\n<li><strong>Service Disruption</strong>: If there is a <strong>continuous service outage exceeding 48 hours</strong>, and the issue is not caused by user-side factors.</li>\n<li><strong>Defective or Misrepresented Services</strong>: If the service provided does not meet the agreed-upon standards or differs materially from what was advertised, as per Section 55 and 56 of the CPA.</li>\n</ul>\n<hr />\n<h2>2. Non-Refundable Situations</h2>\n<p>Refunds will not be issued in the following cases:</p>\n<ul>\n<li><strong>Partial Usage</strong>: If the service was partially used during the billing cycle.</li>\n<li><strong>Unused Features</strong>: If drivers, journeys, or dispatchers included in your plan remain unused.</li>\n<li><strong>Late Cancellation</strong>: If cancellation is requested <strong>after the billing cycle has commenced</strong>.</li>\n<li><strong>Change of Mind</strong>: Refunds will not be granted for cancellations due to a change of mind, unless covered under direct marketing provisions.</li>\n</ul>\n<hr />\n<h2>3. Subscription Cancellation Terms</h2>\n<p>In accordance with <strong>Section 14 of the CPA</strong>, fixed-term contracts may be cancelled by the subscriber with <strong>20 business days’ written notice</strong>. Early cancellation may incur a <strong>reasonable cancellation fee</strong>, calculated based on the remaining term and usage.</p>\n<hr />\n<h2>4. Refund Request Procedure</h2>\n<p>To request a refund, please contact our support team at <strong>support@logisticjourney.com</strong> with the following details:</p>\n<ul>\n<li>Your company name</li>\n<li>Date and reference of the transaction</li>\n<li>Reason for the refund request</li>\n</ul>\n<p>We aim to process all valid refund requests within <strong>5 business days</strong> of receipt.</p>\n<hr />\n<h2>5. Direct Marketing &amp; E-Commerce Transactions</h2>\n<p>If you subscribed through <strong>direct marketing</strong>, you are entitled to cancel the agreement within <strong>5 business days</strong> of receiving the service, as per Section 16 of the CPA. For online purchases, Section 44 of the ECTA allows cancellation within <strong>7 days of receipt</strong>, provided the service has not been used.</p>\n<hr />\n<h2>6. Modifications to This Policy</h2>\n<p>We reserve the right to update or modify this policy at any time. Significant changes will be communicated via email or dashboard notifications. Continued use of our services after such changes constitutes acceptance of the updated policy.</p>\n<hr />\n<p>© 2025 Anylytical Technologies. Based in South Africa. All rights reserved.</p>\n', NULL, NULL, 'published', NULL, '2025-11-06 19:29:54', '2025-11-06 19:29:54'),
(4, 'Delivery Policy', 'delivery-policy', '<h1>Delivery Policy – Logistic Journey</h1>\n<p>At <strong>LogisticJourney.com</strong>, we are committed to <strong>Making Every Journey Count</strong> by providing a reliable and efficient journey and fleet management platform. This Delivery Policy outlines how our services—and where applicable, products—are provisioned, activated, and maintained for our clients.</p>\n<hr />\n<h2>1. Scope of Delivery</h2>\n<p>This policy applies to the delivery of:</p>\n<ul>\n<li><strong>Software Services</strong> (platform access and functionality)</li>\n<li><strong>Driver Mobile App</strong></li>\n<li><strong>System Implementation &amp; Onboarding</strong></li>\n</ul>\n<hr />\n<h2>2. Service Delivery (SaaS)</h2>\n<h3>a. Platform Access</h3>\n<p>Upon successful subscription and payment confirmation:</p>\n<ul>\n<li>Customers will receive access credentials via email within <strong>24–48 hours</strong>.</li>\n<li>Access includes the <strong>Admin Portal</strong>, <strong>Driver Mobile App</strong>, and any relevant <strong>API integrations</strong>.</li>\n</ul>\n<h3>b. Onboarding &amp; Setup</h3>\n<p>For enterprise clients, we offer assisted onboarding, which includes:</p>\n<ul>\n<li>Organizational setup</li>\n<li>Role-based access configuration</li>\n<li>Driver and vehicle data imports</li>\n</ul>\n<p>Setup is typically completed within <strong>5 business days</strong>, subject to client responsiveness and data availability.</p>\n<hr />\n<h2>3. Mobile App Delivery</h2>\n<ul>\n<li>The <strong>Driver App</strong> is available on both <strong>Android</strong> and <strong>iOS</strong> platforms.</li>\n<li>Download links and user guides are provided during onboarding.</li>\n</ul>\n<hr />\n<h2>4. Delivery Delays</h2>\n<p>While we strive to meet all delivery timeframes, delays may occur due to:</p>\n<ul>\n<li>Incomplete or inaccurate client information</li>\n<li>Technical issues beyond our control</li>\n<li>Unforeseen operational constraints</li>\n</ul>\n<p>We will communicate any delays promptly and work to resolve them efficiently.</p>\n<hr />\n<h2>5. Amendments to This Policy</h2>\n<p>We reserve the right to update this policy periodically. Any changes will be:</p>\n<ul>\n<li>Published on our website</li>\n<li>Communicated via email to active customers</li>\n</ul>\n<hr />\n<p>© 2025 Anylytical Technologies. Based in South Africa. All rights reserved.</p>\n', NULL, NULL, 'published', NULL, '2025-11-06 19:29:55', '2025-11-06 19:29:55'),
(5, 'Cancellation Policy', 'cancellation-policy', '<h1>Cancellation Policy – Logistic Journey</h1>\n<p>At <strong>Logistic Journey</strong>, we aim to offer flexibility and clarity around service cancellations. This policy outlines how and when cancellations can be made, in accordance with South Africa’s <strong>Consumer Protection Act (CPA)</strong>.</p>\n<hr />\n<h2>1. Free Setup</h2>\n<p>We offer a <strong>free organization setup</strong>, including:</p>\n<ul>\n<li>Company profiles</li>\n<li>Driver and vehicle registration</li>\n</ul>\n<p>This ensures you\'re fully set up and satisfied before billing begins.</p>\n<hr />\n<h2>2. Monthly Billing</h2>\n<ul>\n<li>All subscriptions are billed <strong>monthly per vehicle</strong>.</li>\n<li>Cancellations made <strong>before the billing period begins</strong> will not incur charges.</li>\n<li>Once the billing cycle starts, the subscription remains active until the end of the cycle.</li>\n</ul>\n<hr />\n<h2>3. General Cancellations</h2>\n<ul>\n<li>You may cancel your subscription <strong>at any time</strong>.</li>\n<li>Access to services will remain active until the end of the current billing cycle.</li>\n<li><strong>Mid-cycle cancellations</strong> do <strong>not qualify for partial refunds</strong>.</li>\n</ul>\n<hr />\n<h2>4. Training, Consulting, or Workshop Bookings</h2>\n<ul>\n<li><strong>Cancellations ≥ 7 Days Before Event</strong>: Full refund or rescheduling allowed.</li>\n<li><strong>Cancellations &lt; 7 Days Before Event</strong>: 50% cancellation fee applies.</li>\n<li><strong>No-shows</strong>: No refund will be issued.</li>\n</ul>\n<hr />\n<h2>5. Termination by Logistic Journey</h2>\n<p>We reserve the right to terminate services under the following conditions:</p>\n<ul>\n<li>Violation of our <a href=\"#\">Terms of Service</a></li>\n<li>Non-payment of invoices</li>\n<li>Abuse or misuse of the platform or staff</li>\n</ul>\n<p>In such cases, <strong>no refunds</strong> will be issued.</p>\n<hr />\n<h2>6. How to Cancel</h2>\n<p>To cancel your subscription or scheduled service, please email <strong>support@logisticjourney.com</strong> with the following details:</p>\n<ul>\n<li>Your company name</li>\n<li>The service or subscription to cancel</li>\n<li>Reason for cancellation</li>\n</ul>\n<hr />\n<p>© 2025 Anylytical Technologies. Based in South Africa. All rights reserved.</p>\n', NULL, NULL, 'published', NULL, '2025-11-06 19:29:56', '2025-11-06 19:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint UNSIGNED DEFAULT NULL,
  `creator_id` bigint UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `scheduled_for` timestamp NULL DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `author_id`, `creator_id`, `type`, `banner`, `featured_image`, `excerpt`, `body`, `status`, `scheduled_for`, `published_at`, `is_featured`, `meta_title`, `meta_description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '10 Ways to Optimize Your Supply Chain in 2025', '10-ways-optimize-supply-chain-2025', 8, NULL, 'blog', NULL, NULL, 'Discover proven strategies to streamline your supply chain operations and reduce costs in the new year.', '<p></p><p></p><p><img src=\"https://logisticjourney.onrender.com/storage/blog/attachments/o6JktIXS1zSOPICdIFVF7V6tqCFk9pvl7z82mRn4.jpg\" data-id=\"blog/attachments/o6JktIXS1zSOPICdIFVF7V6tqCFk9pvl7z82mRn4.jpg\"></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce varius faucibus massa sollicitudin amet augue. Nibh metus a semper purus mauris duis. Lorem eu neque, tristique quis duis. Nibh scelerisque ac adipiscing velit non nulla in amet pellentesque. Sit turpis pretium eget maecenas. Vestibulum dolor mattis consectetur eget commodo vitae.</p><p></p><p></p><h3>1. AI Driven Financial Tools</h3><p></p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce varius faucibus massa sollicitudin amet augue. Nibh metus a semper purus mauris duis. Lorem eu neque, tristique quis duis. Nibh scelerisque ac adipiscing velit non nulla in amet pellentesque. Sit turpis pretium eget maecenas. Vestibulum dolor mattis consectetur eget commodo vitae.</p><p></p><p></p><h3>2. Automated Investment Strategies</h3><p></p><p>Discover cutting-edge algorithms that optimize your investment portfolio based on real-time market data and trends. These strategies are designed to minimize risk while maximizing returns, leveraging machine learning to adapt to changing conditions.</p><p></p><p></p><h3>3. Personalized Budgeting Solutions</h3><p></p><p>Utilize tools that analyze spending habits and provide tailored budgeting recommendations. These solutions aim to enhance financial literacy and empower users to achieve their financial goals through actionable insights and tracking features.</p><p></p><p></p><p><img src=\"https://logisticjourney.onrender.com/storage/blog/attachments/hoJXLyl0cucbn6FEKymXFt5qNGQhfWmrQc7qPy8K.jpg\" data-id=\"blog/attachments/hoJXLyl0cucbn6FEKymXFt5qNGQhfWmrQc7qPy8K.jpg\"></p><p></p><p></p><h3>4. Automated Savings Plans</h3><p></p><p>Implement systems that automatically transfer funds into savings accounts based on user-defined goals. <br>This feature promotes consistent saving habits and helps users quickly build an emergency fund or save for specific purchases without needing to think about it.</p><p></p><p></p><h3>5. Investment Tracking Tools</h3><p></p><ul><li><p>-Keep your login details private.<br>- If you suspect unauthorized use of your account, notify us immediately.<br>- We’re not liable for damages resulting from stolen or misused credentials.</p><p></p></li></ul><p>Offer platforms that allow users to monitor their investment portfolios in real-time. These tools provide analytics on performance, diversification, and risk assessment, helping users make informed decisions and optimize their investment strategies.</p>', 'published', NULL, '2025-11-04 10:27:58', 1, '10 Ways to Optimize Your Supply Chain in 2025 | Logistics Blog', 'Learn 10 proven strategies to streamline supply chain operations, reduce costs, and improve efficiency in 2025.', '2025-11-14 20:48:05', '2025-11-06 10:27:59', '2025-11-14 20:48:05'),
(2, 'The Future of Warehouse Automation: AI and Robotics', 'future-warehouse-automation-ai-robotics', 7, NULL, 'blog', NULL, NULL, 'How artificial intelligence and robotics are transforming modern warehouse operations.', '<h2>The Dawn of Smart Warehouses</h2><p>Warehouse automation has evolved dramatically with the integration of AI and robotics. Modern facilities are transforming into intelligent operations that can adapt and learn.</p><h2>Key Technologies</h2><p>Autonomous mobile robots (AMRs), AI-powered inventory management systems, and machine learning algorithms are reshaping how warehouses operate.</p><h2>Benefits and ROI</h2><p>Companies implementing warehouse automation typically see 25-40% improvement in operational efficiency and significant reduction in labor costs.</p>', 'published', NULL, '2025-11-01 10:27:58', 1, 'Warehouse Automation with AI & Robotics | Future of Logistics', 'Explore how AI and robotics are revolutionizing warehouse automation and improving operational efficiency.', '2025-11-14 20:48:04', '2025-11-06 10:28:02', '2025-11-14 20:48:04'),
(3, 'Last-Mile Delivery Challenges and Solutions', 'last-mile-delivery-challenges-solutions', 2, NULL, 'blog', NULL, NULL, 'Addressing the toughest challenges in last-mile delivery with innovative solutions.', '<h2>The Last-Mile Challenge</h2><p>Last-mile delivery represents up to 53% of total shipping costs and poses unique challenges for logistics providers. Let\'s explore effective solutions.</p><h2>Urban Delivery Strategies</h2><p>Micro-fulfillment centers, route optimization, and alternative delivery methods like lockers and pickup points are proving effective.</p><h2>Technology Solutions</h2><p>Real-time tracking, dynamic routing, and customer communication platforms are essential for successful last-mile operations.</p>', 'published', NULL, '2025-10-30 10:27:58', 1, 'Last-Mile Delivery Challenges & Solutions for 2025', 'Discover effective solutions to overcome last-mile delivery challenges and improve customer satisfaction.', '2025-11-14 20:48:04', '2025-11-06 10:28:04', '2025-11-14 20:48:04'),
(4, 'Implementing a Transportation Management System (TMS)', 'implementing-transportation-management-system-tms', 3, NULL, 'case study', NULL, NULL, 'A comprehensive guide to selecting and implementing a TMS for your business.', '<h2>Introduction</h2><p>This article provides comprehensive insights into modern logistics practices and strategies for operational excellence.</p><h2>Key Concepts</h2><p>Understanding the fundamentals is essential for implementing effective logistics solutions in your organization.</p><h2>Best Practices</h2><p>Industry-leading companies follow proven methodologies to achieve superior supply chain performance.</p><h2>Conclusion</h2><p>By applying these principles, you can transform your logistics operations and drive business success.</p>', 'published', NULL, '2025-10-27 10:27:58', 1, 'How to Implement a TMS | Step-by-Step Guide', 'Complete guide to selecting and implementing a Transportation Management System (TMS) for your logistics operations.', '2025-11-14 20:48:04', '2025-11-06 10:28:06', '2025-11-14 20:48:04'),
(5, 'Sustainable Logistics: Reducing Carbon Footprint', 'sustainable-logistics-reducing-carbon-footprint', 5, NULL, 'blog', NULL, NULL, 'Practical steps to make your logistics operations more environmentally friendly.', '<h2>Introduction</h2><p>This article provides comprehensive insights into modern logistics practices and strategies for operational excellence.</p><h2>Key Concepts</h2><p>Understanding the fundamentals is essential for implementing effective logistics solutions in your organization.</p><h2>Best Practices</h2><p>Industry-leading companies follow proven methodologies to achieve superior supply chain performance.</p><h2>Conclusion</h2><p>By applying these principles, you can transform your logistics operations and drive business success.</p>', 'published', NULL, '2025-10-25 10:27:58', 1, 'Sustainable Logistics & Carbon Footprint Reduction', 'Learn how to implement sustainable logistics practices and reduce your carbon footprint.', '2025-11-14 20:47:55', '2025-11-06 10:28:09', '2025-11-14 20:47:55'),
(6, 'Inventory Management Best Practices for E-commerce', 'inventory-management-best-practices-ecommerce', 7, NULL, 'blog', NULL, NULL, 'Essential inventory management strategies for online retailers.', '<h2>Introduction</h2><p>This article provides comprehensive insights into modern logistics practices and strategies for operational excellence.</p><h2>Key Concepts</h2><p>Understanding the fundamentals is essential for implementing effective logistics solutions in your organization.</p><h2>Best Practices</h2><p>Industry-leading companies follow proven methodologies to achieve superior supply chain performance.</p><h2>Conclusion</h2><p>By applying these principles, you can transform your logistics operations and drive business success.</p>', 'published', NULL, '2025-10-22 10:27:58', 1, 'E-commerce Inventory Management Best Practices', 'Master inventory management with proven strategies designed for e-commerce businesses.', '2025-11-14 20:47:55', '2025-11-06 10:28:11', '2025-11-14 20:47:55'),
(7, 'IoT in Logistics: Real-Time Tracking and Visibility', 'iot-logistics-real-time-tracking-visibility', 4, NULL, 'case study', NULL, NULL, 'How IoT sensors and connected devices are improving supply chain visibility.', '<h2>Introduction</h2><p>This article provides comprehensive insights into modern logistics practices and strategies for operational excellence.</p><h2>Key Concepts</h2><p>Understanding the fundamentals is essential for implementing effective logistics solutions in your organization.</p><h2>Best Practices</h2><p>Industry-leading companies follow proven methodologies to achieve superior supply chain performance.</p><h2>Conclusion</h2><p>By applying these principles, you can transform your logistics operations and drive business success.</p>', 'published', NULL, '2025-10-19 10:27:58', 0, 'IoT in Logistics: Real-Time Tracking Solutions', 'Discover how IoT technology enables real-time tracking and improves supply chain visibility.', '2025-11-14 20:47:55', '2025-11-06 10:28:13', '2025-11-14 20:47:55'),
(8, 'Managing Supply Chain Disruptions in 2025', 'managing-supply-chain-disruptions-2025', 7, NULL, 'blog', NULL, NULL, 'Strategies to build resilience and mitigate risks in your supply chain.', '<h2>Introduction</h2><p>This article provides comprehensive insights into modern logistics practices and strategies for operational excellence.</p><h2>Key Concepts</h2><p>Understanding the fundamentals is essential for implementing effective logistics solutions in your organization.</p><h2>Best Practices</h2><p>Industry-leading companies follow proven methodologies to achieve superior supply chain performance.</p><h2>Conclusion</h2><p>By applying these principles, you can transform your logistics operations and drive business success.</p>', 'published', NULL, '2025-10-17 10:27:58', 0, 'Managing Supply Chain Disruptions | Risk Mitigation', 'Learn effective strategies to manage supply chain disruptions and build operational resilience.', '2025-11-14 20:47:55', '2025-11-06 10:28:16', '2025-11-14 20:47:55'),
(9, 'Fleet Management Software: A Complete Buyer\'s Guide', 'fleet-management-software-buyers-guide', 7, NULL, 'case study', NULL, NULL, 'Everything you need to know when selecting fleet management software.', '<h2>Introduction</h2><p>This article provides comprehensive insights into modern logistics practices and strategies for operational excellence.</p><h2>Key Concepts</h2><p>Understanding the fundamentals is essential for implementing effective logistics solutions in your organization.</p><h2>Best Practices</h2><p>Industry-leading companies follow proven methodologies to achieve superior supply chain performance.</p><h2>Conclusion</h2><p>By applying these principles, you can transform your logistics operations and drive business success.</p>', 'published', NULL, '2025-10-14 10:27:58', 0, 'Fleet Management Software Buyer\'s Guide 2025', 'Complete guide to choosing the right fleet management software for your transportation needs.', '2025-11-14 20:47:54', '2025-11-06 10:28:18', '2025-11-14 20:47:54'),
(10, 'Demand Forecasting Techniques for Accurate Planning', 'demand-forecasting-techniques-accurate-planning', 8, NULL, 'case study', NULL, NULL, 'Advanced forecasting methods to improve inventory planning and reduce stockouts.', '<h2>Introduction</h2><p>This article provides comprehensive insights into modern logistics practices and strategies for operational excellence.</p><h2>Key Concepts</h2><p>Understanding the fundamentals is essential for implementing effective logistics solutions in your organization.</p><h2>Best Practices</h2><p>Industry-leading companies follow proven methodologies to achieve superior supply chain performance.</p><h2>Conclusion</h2><p>By applying these principles, you can transform your logistics operations and drive business success.</p>', 'published', NULL, '2025-10-12 10:27:58', 0, 'Demand Forecasting Techniques | Inventory Planning', 'Master demand forecasting techniques to improve inventory planning and reduce stockouts.', '2025-11-14 20:47:54', '2025-11-06 10:28:20', '2025-11-14 20:47:54'),
(11, 'Cross-Border Logistics: Navigating Customs and Compliance', 'cross-border-logistics-customs-compliance', 5, NULL, 'case study', NULL, NULL, 'A practical guide to international shipping regulations and compliance requirements.', '<h2>Introduction</h2><p>This article provides comprehensive insights into modern logistics practices and strategies for operational excellence.</p><h2>Key Concepts</h2><p>Understanding the fundamentals is essential for implementing effective logistics solutions in your organization.</p><h2>Best Practices</h2><p>Industry-leading companies follow proven methodologies to achieve superior supply chain performance.</p><h2>Conclusion</h2><p>By applying these principles, you can transform your logistics operations and drive business success.</p>', 'published', NULL, '2025-10-09 10:27:58', 0, 'Cross-Border Logistics: Customs & Compliance Guide', 'Navigate international shipping with our comprehensive guide to customs and compliance.', '2025-11-14 20:47:54', '2025-11-06 10:28:23', '2025-11-14 20:47:54'),
(12, 'Optimizing Order Fulfillment Speed and Accuracy', 'optimizing-order-fulfillment-speed-accuracy', 5, NULL, 'blog', NULL, NULL, 'Proven strategies to improve fulfillment efficiency and reduce errors.', '<h2>Introduction</h2><p>This article provides comprehensive insights into modern logistics practices and strategies for operational excellence.</p><h2>Key Concepts</h2><p>Understanding the fundamentals is essential for implementing effective logistics solutions in your organization.</p><h2>Best Practices</h2><p>Industry-leading companies follow proven methodologies to achieve superior supply chain performance.</p><h2>Conclusion</h2><p>By applying these principles, you can transform your logistics operations and drive business success.</p>', 'published', NULL, '2025-10-07 10:27:58', 0, 'Order Fulfillment Optimization | Speed & Accuracy', 'Learn strategies to optimize order fulfillment speed and accuracy in your warehouse.', '2025-11-14 20:47:54', '2025-11-06 10:28:25', '2025-11-14 20:47:54'),
(13, 'Upcoming Trends in Logistics Technology', 'upcoming-trends-logistics-technology', 8, NULL, 'blog', NULL, NULL, 'Stay ahead with insights into emerging technologies transforming logistics.', '<h2>Introduction</h2><p>This article provides comprehensive insights into modern logistics practices and strategies for operational excellence.</p><h2>Key Concepts</h2><p>Understanding the fundamentals is essential for implementing effective logistics solutions in your organization.</p><h2>Best Practices</h2><p>Industry-leading companies follow proven methodologies to achieve superior supply chain performance.</p><h2>Conclusion</h2><p>By applying these principles, you can transform your logistics operations and drive business success.</p>', 'scheduled', '2025-11-09 10:27:58', NULL, 0, 'Upcoming Trends in Logistics Technology 2025', 'Explore the latest technology trends shaping the future of logistics and supply chain.', '2025-11-14 20:47:54', '2025-11-06 10:28:27', '2025-11-14 20:47:54'),
(14, 'Building a Resilient Supply Chain Network', 'building-resilient-supply-chain-network', 7, NULL, 'blog', NULL, NULL, 'How to design supply chains that withstand disruptions and uncertainties.', '<h2>Introduction</h2><p>This article provides comprehensive insights into modern logistics practices and strategies for operational excellence.</p><h2>Key Concepts</h2><p>Understanding the fundamentals is essential for implementing effective logistics solutions in your organization.</p><h2>Best Practices</h2><p>Industry-leading companies follow proven methodologies to achieve superior supply chain performance.</p><h2>Conclusion</h2><p>By applying these principles, you can transform your logistics operations and drive business success.</p>', 'draft', NULL, NULL, 0, 'Building a Resilient Supply Chain Network', 'Design supply chains that can withstand disruptions with these resilience strategies.', '2025-11-14 20:47:54', '2025-11-06 10:28:30', '2025-11-14 20:47:54'),
(15, 'Behind the Scenes: Building Logistic Journey', 'behind-the-scenes-building-logistic-journey', 1, NULL, 'blog', NULL, NULL, NULL, '<p>At Anylytical Technologies, we’ve spent over a decade building enterprise-grade software solutions across industries. But in 2024, we took on a unique challenge: to create a world-class journey management system that would help logistics and transport businesses plan, monitor, and optimize their operations in real time.</p><p>This is the story of how <strong>Logistic Journey</strong> came to life — from concept to market-ready solution.</p><h3><strong>1. Identifying a Painful Gap in the Market</strong></h3><p>Logistics operations across South Africa — and much of the continent — face a common set of challenges:</p><ul><li><p>Little to no visibility on where vehicles and drivers are</p></li><li><p>Paper-based or inconsistent order and journey planning</p></li><li><p>Overworked dispatchers and frustrated customers</p></li><li><p>No integration between systems, leading to duplicated effort</p></li></ul><p>We saw an opportunity to address all of this with a powerful but simple-to-use software platform tailored to <strong>African logistics businesses</strong>.</p><h3><strong>2. Designing the Solution Around the User</strong></h3><p>We didn’t just start coding. Instead, we:</p><ul><li><p>Interviewed logistics managers, fleet supervisors, and dispatchers</p></li><li><p>Mapped their real-world workflows</p></li><li><p>Identified key decision points, bottlenecks, and failure risks</p></li></ul><p>This led to features like:</p><ul><li><p>A <strong>multi-tiered organization structure</strong></p></li><li><p><strong>Live tracking</strong> and ETA prediction</p></li><li><p><strong>Turn-by-turn navigation</strong> via the driver mobile app</p></li><li><p>A <strong>role-based system</strong> using Keycloak for secure access</p></li></ul><h3><strong>3. Choosing a Scalable Tech Stack</strong></h3><p>We selected a modern stack for flexibility and scalability:</p><ul><li><p><strong>Spring Boot</strong> for the backend</p></li><li><p><strong>Angular</strong> with PrimeNG for a fast, responsive UI</p></li><li><p><strong>PostgreSQL</strong> as the primary database</p></li><li><p><strong>Docker</strong> for containerization</p></li><li><p><strong>JHipster</strong> to accelerate domain-driven design</p></li></ul><h3><strong>4. Testing with Real-World Clients</strong></h3><p>We launched a closed beta with real logistics users to:</p><ul><li><p>Observe how dispatchers and drivers interacted with the system</p></li><li><p>Refine the UI/UX of both the admin and mobile apps</p></li><li><p>Optimize backend workflows and reporting</p></li></ul><h3><strong>5. Continuous Improvement</strong></h3><p>Since launch, we’ve added and are working on even more features, including:</p><ul><li><p><strong>Driver reward systems</strong></p></li><li><p><strong>In-app messaging</strong></p></li><li><p><strong>Proof of delivery</strong> (with photos/videos)</p></li><li><p><strong>API integrations</strong> for external systems</p></li></ul><h3><strong>Conclusion</strong></h3><p>Building Logistic Journey wasn’t just about software — it was about solving real operational problems. And we’re proud to offer a platform that’s purpose-built for the logistics industry in Africa and beyond.</p>', 'published', NULL, NULL, 1, NULL, NULL, NULL, '2025-11-14 20:52:01', '2025-11-14 20:52:01'),
(16, 'How Technology is Transforming Logistics', 'how-technology-is-transforming-logistics', 1, NULL, 'blog', NULL, NULL, NULL, '<p>The logistics industry is evolving faster than ever. Driven by growing demand, tighter customer expectations, and a global need for real-time visibility, logistics companies must embrace modern technologies to stay competitive.</p><p>At Logistic Journey, we believe technology isn’t just a support tool — it’s the engine powering smarter, safer, and more efficient fleet operations.</p><p>Here’s how technology is revolutionizing logistics in 2025 and beyond.</p><h3><strong>1. Real-Time GPS Tracking</strong></h3><ul><li><p>Dispatchers can view live vehicle locations</p></li><li><p>Customers can receive real-time ETAs</p></li><li><p>Route efficiency improves dramatically</p></li></ul><p>This enhances transparency and reduces manual check-ins, saving hours every week.</p><h3><strong>2. Artificial Intelligence &amp; Predictive Analytics</strong></h3><p>AI is enabling logistics companies to make better decisions, faster:</p><ul><li><p><strong>Predictive maintenance:</strong> Forecasts when vehicles need servicing</p></li><li><p><strong>Demand forecasting:</strong> Plans fleet capacity during peak times</p></li><li><p><strong>Smart routing:</strong> Adapts to traffic, weather, and road closures</p></li></ul><h3><strong>3. Internet of Things (IoT) Sensors</strong></h3><p>IoT devices bring visibility to everything:</p><ul><li><p><strong>Temperature tracking</strong> for cold-chain logistics</p></li><li><p><strong>Fuel usage monitoring</strong> for cost savings</p></li><li><p><strong>Driver behavior alerts</strong> for safety improvements</p></li></ul><h3><strong>4. Mobile Apps for Drivers</strong></h3><ul><li><p>Display routes and job details</p></li><li><p>Allow drivers to mark tasks complete</p></li><li><p>Capture signatures, photos, and notes</p></li><li><p>Provide turn-by-turn navigation</p></li></ul><h3><strong>5. Cloud Platforms for Collaboration</strong></h3><p>Cloud-based logistics systems enable:</p><ul><li><p>Real-time collaboration between teams</p></li><li><p>Role-based access across the organization</p></li><li><p>Centralized storage for all operations</p></li><li><p>Access from any location, at any time</p></li></ul><h3><strong>6. Enhanced Security &amp; Compliance</strong></h3><p>With platforms like Keycloak, you can:</p><ul><li><p>Control who sees what</p></li><li><p>Log user activity for audits</p></li><li><p>Meet data compliance laws like POPIA and GDPR</p></li></ul><h3><strong>Conclusion</strong></h3><p>Technology is no longer optional in logistics — it’s your competitive edge. The companies embracing AI, IoT, and cloud-native systems are delivering faster, safer, and smarter every day.</p><p>At <strong>Logistic Journey</strong>, we’re proud to build tools that empower logistics teams to do more with less effort.</p><p><strong>Ready to transform your fleet?</strong> <a target=\"_blank\" rel=\"noopener noreferrer nofollow\" href=\"https://new.logisticjourney.com/Request_demo\">Sign up now!!</a> and discover what modern logistics really looks like.</p>', 'published', NULL, NULL, 1, NULL, NULL, NULL, '2025-11-14 21:10:01', '2025-11-14 21:21:34'),
(17, 'Top 5 Tips to Optimize Your Fleet', 'top-5-tips-to-optimize-your-fleet', 1, NULL, 'blog', NULL, NULL, NULL, '<p>Managing a fleet isn’t just about keeping vehicles on the road — it’s about making every journey count. In a world where margins are tight and expectations are high, even small improvements in fleet operations can drive significant returns.</p><p>At <strong>Logistic Journey</strong>, we’ve worked with fleets across South Africa and beyond. Here are our top 5 proven tips to get the most from your fleet — starting today.</p><h3><strong>1. Embrace Real-Time GPS Tracking</strong></h3><p>You can’t manage what you can’t see.</p><ul><li><p>Monitor vehicle locations live</p></li><li><p>Reduce unauthorized stops or detours</p></li><li><p>Improve dispatcher efficiency with better coordination</p></li><li><p>Provide accurate ETAs to clients</p></li></ul><p>With Logistic Journey’s built-in live tracking, you gain full visibility — and peace of mind.</p><h3><strong>2. Streamline Routes with Smart Planning</strong></h3><p>Fuel is one of your biggest operational costs. Optimized routes mean:</p><ul><li><p>Fewer kilometers driven</p></li><li><p>Reduced fuel consumption</p></li><li><p>Less wear and tear on vehicles</p></li><li><p>Faster deliveries and happier clients</p></li></ul><h3><strong>3. Train and Empower Your Drivers</strong></h3><p>Your drivers are your brand on the road. The better trained they are, the more efficiently and safely your fleet runs.</p><ul><li><p>Fuel-efficient driving habits</p></li><li><p>Clear SOPs for check-ins and confirmations</p></li><li><p>In-app task management with our mobile app</p></li></ul><p>Empowered drivers make fewer mistakes — and stick around longer.</p><h3><strong>4. Use Data to Drive Decisions</strong></h3><p>Fleet optimization starts with understanding performance. Don’t fly blind.</p><ul><li><p>Fuel usage by vehicle</p></li><li><p>Downtime per driver</p></li><li><p>Maintenance tracking</p></li><li><p>Journey success rates</p></li></ul><p>Logistic Journey gives you these insights out of the box.</p><h3><strong>5. Automate Repetitive Tasks</strong></h3><p>Automation saves time and reduces human error:</p><ul><li><p>Auto-create journeys and assign drivers</p></li><li><p>Maintenance and service alerts</p></li><li><p>Automated shift reminders</p></li><li><p>Notification for delays or delivery failures</p></li></ul><h3><strong>Conclusion</strong></h3><p>Optimizing your fleet doesn’t require massive changes — just smarter decisions, better tools, and a willingness to adapt. Start with these five steps, and you’ll see real improvements in cost, efficiency, and reliability.</p><p><strong>Ready to level up your logistics?</strong> <a target=\"_blank\" rel=\"noopener noreferrer nofollow\" href=\"https://new.logisticjourney.com/Request_demo\">Sign up now!!</a> and discover how Logistic Journey makes fleet optimization effortless.</p>', 'published', NULL, NULL, 1, NULL, NULL, NULL, '2025-11-14 21:20:32', '2025-11-14 21:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `post_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`post_id`, `category_id`) VALUES
(1, 1),
(5, 1),
(8, 1),
(10, 1),
(14, 1),
(3, 2),
(9, 2),
(11, 2),
(4, 3),
(7, 3),
(13, 3),
(2, 4),
(6, 4),
(12, 4),
(15, 17),
(16, 18),
(17, 19);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `discount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_value` decimal(8,2) NOT NULL,
  `applicable_plans` json DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gOhQrwCjuw23U3I8vS6QwPSpXiDTB2uF79ip922l', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoic3JjSFBBaE1SZjZUNm0zQmRQYjMyUHFmeEV6bGF3blBxdDd6MUJ1aiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcHAvcGFnZXMvOC9lZGl0IjtzOjU6InJvdXRlIjtzOjMzOiJmaWxhbWVudC5hcHAucmVzb3VyY2VzLnBhZ2VzLmVkaXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NjoidGFibGVzIjthOjE6e3M6NDA6Ijk1YTQxMmE1ZTM5ZTBkNzY2NjA3M2ZhYzdlM2M5OWYzX2NvbHVtbnMiO2E6Nzp7aTowO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjU6InRpdGxlIjtzOjU6ImxhYmVsIjtzOjU6IlRpdGxlIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo0OiJzbHVnIjtzOjU6ImxhYmVsIjtzOjQ6IlNsdWciO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjowO31pOjI7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6NDoidHlwZSI7czo1OiJsYWJlbCI7czo0OiJUeXBlIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMjoicGFyZW50LnRpdGxlIjtzOjU6ImxhYmVsIjtzOjY6IlBhcmVudCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjA7fWk6NDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo2OiJzdGF0dXMiO3M6NToibGFiZWwiO3M6NjoiU3RhdHVzIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czozOiJ1cmwiO3M6NToibGFiZWwiO3M6MzoiVVJMIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9aTo2O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJjcmVhdGVkX2F0IjtzOjU6ImxhYmVsIjtzOjEwOiJDcmVhdGVkIGF0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9fX1zOjg6ImZpbGFtZW50IjthOjA6e319', 1762985046),
('WXirzCEGploNCbyfuQUvzNRF6Acm4IhtbdGnCXIk', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoieHF4VVFmelZoRVMwRmZWM3poTHlZMTc1UVE5Yzk3NHpoOHJvTHRqeCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcHAvcG9saWNpZXMiO3M6NToicm91dGUiO3M6Mzc6ImZpbGFtZW50LmFwcC5yZXNvdXJjZXMucG9saWNpZXMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NjoidGFibGVzIjthOjE6e3M6NDA6ImJkZDcyNzIwZmMzZDFiZjMxOTBlMmNmYzQ3NTUzNThmX2NvbHVtbnMiO2E6NTp7aTowO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjU6InRpdGxlIjtzOjU6ImxhYmVsIjtzOjU6IlRpdGxlIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo0OiJzbHVnIjtzOjU6ImxhYmVsIjtzOjQ6IlNsdWciO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjowO31pOjI7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6Njoic3RhdHVzIjtzOjU6ImxhYmVsIjtzOjY6IlN0YXR1cyI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjM7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6InVwZGF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MTI6Ikxhc3QgVXBkYXRlZCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjQ7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImNyZWF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MTA6IkNyZWF0ZWQgYXQiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjowO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjoxO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7YjoxO319fXM6ODoiZmlsYW1lbnQiO2E6MDp7fX0=', 1763032353);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscribed_at` timestamp NULL DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verified_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `unsubscribed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `name`, `subscribed_at`, `is_verified`, `verified_at`, `status`, `unsubscribed_at`, `created_at`, `updated_at`) VALUES
(1, 'brandon.taylor@yahoo.com', NULL, NULL, 0, '2025-09-28 19:30:21', 'verified', NULL, '2025-09-15 19:30:21', '2025-10-18 19:30:21'),
(2, 'ashley.gonzalez@hotmail.com', NULL, NULL, 0, '2025-10-31 19:30:21', 'verified', NULL, '2025-11-05 19:30:21', '2025-10-09 19:30:21'),
(3, 'brandon.hill@gmail.com', NULL, NULL, 0, '2025-08-20 19:30:21', 'unsubscribed', NULL, '2025-08-18 19:30:21', '2025-10-17 19:30:21'),
(4, 'alexander.brown@hotmail.com', NULL, NULL, 0, '2025-09-22 19:30:21', 'verified', NULL, '2025-07-11 19:30:21', '2025-10-18 19:30:21'),
(5, 'michelle.sanchez@business.net', NULL, NULL, 0, '2025-09-07 19:30:21', 'verified', NULL, '2025-08-08 19:30:21', '2025-11-04 19:30:21'),
(6, 'rebecca.hernandez@enterprise.io', NULL, NULL, 0, '2025-08-31 19:30:21', 'verified', NULL, '2025-09-02 19:30:21', '2025-11-06 19:30:21'),
(7, 'benjamin.flores@outlook.com', NULL, NULL, 0, '2025-09-20 19:30:21', 'verified', NULL, '2025-09-07 19:30:21', '2025-10-18 19:30:21'),
(8, 'kevin.davis@company.com', NULL, NULL, 0, '2025-08-10 19:30:21', 'verified', NULL, '2025-10-03 19:30:21', '2025-10-17 19:30:21'),
(9, 'samantha.martinez@business.net', NULL, NULL, 0, NULL, 'pending', NULL, '2025-08-14 19:30:21', '2025-10-24 19:30:21'),
(10, 'brandon.nguyen@gmail.com', NULL, NULL, 0, '2025-08-14 19:30:21', 'verified', NULL, '2025-09-08 19:30:21', '2025-10-25 19:30:21'),
(11, 'matthew.rodriguez@company.com', NULL, NULL, 0, '2025-09-09 19:30:21', 'verified', NULL, '2025-07-19 19:30:21', '2025-10-27 19:30:21'),
(12, 'kevin.white@business.net', NULL, NULL, 0, '2025-10-03 19:30:21', 'verified', NULL, '2025-07-20 19:30:21', '2025-10-28 19:30:21'),
(13, 'benjamin.wilson@hotmail.com', NULL, NULL, 0, '2025-08-10 19:30:21', 'unsubscribed', NULL, '2025-11-02 19:30:21', '2025-10-27 19:30:21'),
(14, 'alexander.anderson@hotmail.com', NULL, NULL, 0, '2025-10-28 19:30:21', 'verified', NULL, '2025-10-12 19:30:21', '2025-10-07 19:30:21'),
(15, 'hannah.allen@enterprise.io', NULL, NULL, 0, '2025-09-27 19:30:21', 'verified', NULL, '2025-10-28 19:30:21', '2025-10-29 19:30:21'),
(16, 'samantha.hill@yahoo.com', NULL, NULL, 0, '2025-09-13 19:30:21', 'verified', NULL, '2025-07-29 19:30:21', '2025-11-05 19:30:21'),
(17, 'ashley.rodriguez@gmail.com', NULL, NULL, 0, '2025-10-10 19:30:21', 'verified', NULL, '2025-09-24 19:30:21', '2025-10-28 19:30:21'),
(18, 'amanda.jackson@business.net', NULL, NULL, 0, '2025-11-05 19:30:21', 'verified', NULL, '2025-09-29 19:30:21', '2025-10-25 19:30:21'),
(19, 'michael.robinson@business.net', NULL, NULL, 0, '2025-09-10 19:30:21', 'verified', NULL, '2025-08-13 19:30:21', '2025-10-28 19:30:21'),
(20, 'lauren.lopez@yahoo.com', NULL, NULL, 0, '2025-08-16 19:30:21', 'verified', NULL, '2025-07-27 19:30:21', '2025-10-16 19:30:21'),
(21, 'james.flores@enterprise.io', NULL, NULL, 0, NULL, 'pending', NULL, '2025-10-21 19:30:21', '2025-10-17 19:30:21'),
(22, 'alexander.gonzalez21@enterprise.io', NULL, NULL, 0, NULL, 'pending', NULL, '2025-10-22 19:30:21', '2025-11-03 19:30:21'),
(23, 'jennifer.jackson22@gmail.com', NULL, NULL, 0, '2025-08-13 19:30:21', 'verified', NULL, '2025-07-24 19:30:21', '2025-10-19 19:30:21'),
(24, 'kimberly.thomas23@hotmail.com', NULL, NULL, 0, '2025-09-07 19:30:21', 'verified', NULL, '2025-09-15 19:30:21', '2025-10-08 19:30:21'),
(25, 'lauren.young24@hotmail.com', NULL, NULL, 0, NULL, 'pending', NULL, '2025-10-15 19:30:21', '2025-10-08 19:30:21'),
(26, 'brandon.brown25@outlook.com', NULL, NULL, 0, '2025-10-23 19:30:21', 'verified', NULL, '2025-09-20 19:30:21', '2025-11-05 19:30:21'),
(27, 'rebecca.gonzalez26@business.net', NULL, NULL, 0, '2025-10-04 19:30:21', 'verified', NULL, '2025-10-10 19:30:21', '2025-11-03 19:30:21'),
(28, 'jonathan.hernandez27@gmail.com', NULL, NULL, 0, '2025-10-02 19:30:21', 'verified', NULL, '2025-08-18 19:30:21', '2025-10-28 19:30:21'),
(29, 'benjamin.rodriguez28@yahoo.com', NULL, NULL, 0, '2025-10-17 19:30:21', 'verified', NULL, '2025-08-27 19:30:21', '2025-10-28 19:30:21'),
(30, 'benjamin.gonzalez29@gmail.com', NULL, NULL, 0, '2025-10-22 19:30:21', 'verified', NULL, '2025-09-01 19:30:21', '2025-10-09 19:30:21'),
(31, 'amy.miller30@outlook.com', NULL, NULL, 0, '2025-08-14 19:30:21', 'verified', NULL, '2025-08-02 19:30:21', '2025-11-01 19:30:21'),
(32, 'matthew.martinez31@business.net', NULL, NULL, 0, '2025-08-31 19:30:21', 'verified', NULL, '2025-08-28 19:30:21', '2025-10-29 19:30:21'),
(33, 'ryan.robinson32@yahoo.com', NULL, NULL, 0, NULL, 'pending', NULL, '2025-07-19 19:30:21', '2025-10-18 19:30:21'),
(34, 'ashley.wilson33@enterprise.io', NULL, NULL, 0, '2025-09-17 19:30:21', 'verified', NULL, '2025-09-15 19:30:21', '2025-10-22 19:30:21'),
(35, 'megan.sanchez34@enterprise.io', NULL, NULL, 0, '2025-09-02 19:30:21', 'verified', NULL, '2025-10-14 19:30:21', '2025-11-01 19:30:21'),
(36, 'lisa.wright35@business.net', NULL, NULL, 0, '2025-09-12 19:30:21', 'verified', NULL, '2025-07-29 19:30:21', '2025-10-27 19:30:21'),
(37, 'eric.jones36@company.com', NULL, NULL, 0, '2025-10-23 19:30:21', 'verified', NULL, '2025-07-23 19:30:21', '2025-10-27 19:30:21'),
(38, 'william.flores37@outlook.com', NULL, NULL, 0, '2025-08-24 19:30:21', 'verified', NULL, '2025-10-16 19:30:21', '2025-10-12 19:30:21'),
(39, 'eric.torres38@outlook.com', NULL, NULL, 0, '2025-08-29 19:30:21', 'verified', NULL, '2025-08-29 19:30:21', '2025-10-16 19:30:21'),
(40, 'sarah.williams39@outlook.com', NULL, NULL, 0, '2025-09-20 19:30:21', 'verified', NULL, '2025-08-13 19:30:21', '2025-10-08 19:30:21'),
(41, 'ashley.thomas40@gmail.com', NULL, NULL, 0, NULL, 'pending', NULL, '2025-08-23 19:30:21', '2025-10-13 19:30:21'),
(42, 'ashley.rodriguez41@gmail.com', NULL, NULL, 0, '2025-09-16 19:30:21', 'verified', NULL, '2025-10-01 19:30:21', '2025-11-01 19:30:21'),
(43, 'paul.lewis42@enterprise.io', NULL, NULL, 0, '2025-09-10 19:30:21', 'verified', NULL, '2025-08-25 19:30:21', '2025-11-04 19:30:21'),
(44, 'kevin.gonzalez43@gmail.com', NULL, NULL, 0, '2025-10-22 19:30:21', 'verified', NULL, '2025-08-31 19:30:21', '2025-10-23 19:30:21'),
(45, 'alexander.smith44@yahoo.com', NULL, NULL, 0, '2025-10-30 19:30:21', 'verified', NULL, '2025-07-09 19:30:21', '2025-10-22 19:30:21'),
(46, 'ryan.king45@business.net', NULL, NULL, 0, '2025-08-21 19:30:21', 'verified', NULL, '2025-10-30 19:30:21', '2025-11-06 19:30:21'),
(47, 'amy.torres46@business.net', NULL, NULL, 0, '2025-09-14 19:30:21', 'verified', NULL, '2025-10-28 19:30:21', '2025-10-28 19:30:21'),
(48, 'james.anderson47@enterprise.io', NULL, NULL, 0, '2025-10-04 19:30:21', 'verified', NULL, '2025-09-09 19:30:21', '2025-10-21 19:30:21'),
(49, 'nicole.martinez48@yahoo.com', NULL, NULL, 0, NULL, 'pending', NULL, '2025-10-24 19:30:21', '2025-10-29 19:30:21'),
(50, 'ashley.thomas49@hotmail.com', NULL, NULL, 0, '2025-10-31 19:30:21', 'verified', NULL, '2025-07-30 19:30:21', '2025-10-22 19:30:21'),
(51, 'lauren.nguyen50@company.com', NULL, NULL, 0, '2025-10-15 19:30:21', 'verified', NULL, '2025-07-22 19:30:21', '2025-10-29 19:30:21'),
(52, 'elizabeth.nguyen51@gmail.com', NULL, NULL, 0, '2025-08-27 19:30:21', 'verified', NULL, '2025-08-03 19:30:21', '2025-10-18 19:30:21'),
(53, 'robert.thomas52@yahoo.com', NULL, NULL, 0, NULL, 'pending', NULL, '2025-10-12 19:30:21', '2025-10-12 19:30:21'),
(54, 'amy.gonzalez53@hotmail.com', NULL, NULL, 0, '2025-08-12 19:30:21', 'verified', NULL, '2025-08-05 19:30:21', '2025-11-06 19:30:21'),
(55, 'ashley.king54@gmail.com', NULL, NULL, 0, '2025-08-12 19:30:21', 'verified', NULL, '2025-08-08 19:30:21', '2025-10-10 19:30:21'),
(56, 'steven.garcia55@yahoo.com', NULL, NULL, 0, '2025-09-10 19:30:21', 'verified', NULL, '2025-10-18 19:30:21', '2025-10-23 19:30:21'),
(57, 'alexander.clark56@outlook.com', NULL, NULL, 0, '2025-08-26 19:30:21', 'verified', NULL, '2025-09-07 19:30:21', '2025-10-11 19:30:21'),
(58, 'rebecca.brown57@hotmail.com', NULL, NULL, 0, '2025-10-28 19:30:21', 'verified', NULL, '2025-09-09 19:30:21', '2025-10-09 19:30:21'),
(59, 'megan.ramirez58@enterprise.io', NULL, NULL, 0, '2025-10-02 19:30:21', 'verified', NULL, '2025-08-18 19:30:21', '2025-10-15 19:30:21'),
(60, 'jessica.wilson59@company.com', NULL, NULL, 0, NULL, 'pending', NULL, '2025-09-28 19:30:21', '2025-11-03 19:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Taher Mosa', 'info@logisticjourney.com', '2025-11-06 10:23:37', '$2y$12$QT9BEXPM0rI5D/Y5FKwcxOGoJ2oWnMZLCEx0yJv1VGXQUhOmrMsfq', 'FbP3U19AYZ', '2025-11-06 10:23:38', '2025-11-06 10:23:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `authors_slug_unique` (`slug`),
  ADD KEY `authors_user_id_foreign` (`user_id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blocks_blockable_type_blockable_id_index` (`blockable_type`,`blockable_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`),
  ADD KEY `categories_creator_id_foreign` (`creator_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_assigned_to_foreign` (`assigned_to`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `forms_slug_unique` (`slug`);

--
-- Indexes for table `form_submissions`
--
ALTER TABLE `form_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_submissions_form_id_foreign` (`form_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`),
  ADD KEY `pages_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_features`
--
ALTER TABLE `plan_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_features_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `policies_slug_unique` (`slug`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_author_id_foreign` (`author_id`),
  ADD KEY `posts_status_published_at_index` (`status`,`published_at`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`post_id`,`category_id`),
  ADD KEY `post_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `form_submissions`
--
ALTER TABLE `form_submissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plan_features`
--
ALTER TABLE `plan_features`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `authors`
--
ALTER TABLE `authors`
  ADD CONSTRAINT `authors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `form_submissions`
--
ALTER TABLE `form_submissions`
  ADD CONSTRAINT `form_submissions_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `pages` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `plan_features`
--
ALTER TABLE `plan_features`
  ADD CONSTRAINT `plan_features_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `post_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_category_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
